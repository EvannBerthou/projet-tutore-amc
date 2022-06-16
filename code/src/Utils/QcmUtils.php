<?php

namespace App\Utils;

use App\Entity\QCM;
use App\Repository\QCMRepository;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class QcmUtils {
    private $QCMRepository;

    public function __construct(QCMRepository $QCMRepository) {
        $this->QCMRepository = $QCMRepository;
    }

    public function getQcm(int $id): ?QCM {
        return $this->QCMRepository->find($id);
    }

    public function generate_qcm(QCM $qcm): string {
        $data = $qcm->toAMCTXT();
        $process = new Process(['sh', 'scripts/test.sh', $data]);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return $process->getOutput();
    }

    public function create_qcm_file_to_send(string $filename, string $content): Response {
        $response = new Response();
        $response->headers->set('Content-Disposition', 'attachment; filename="' . $filename . '";');
        $response->headers->set('Content-length', strlen($content));
        $response->sendHeaders();
        $response->setContent($content);
        return $response;
    }

    public function getNextId() {
        return $this->QCMRepository->getMaxId() + 1;
    }

    public function serialize($qcms) {
        $encoders = [new JsonEncoder()];
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return $object->getId();
            },
        ];
        $normalizers = [new ObjectNormalizer(null, null, null, null, null, null, $defaultContext)];

        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($qcms, 'json');
        return $jsonContent;
    }

    public function deserialize($response) {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer(), new ArrayDenormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $data = json_decode($response->getContent());   
        $qcms = $serializer->deserialize($data, 'App\Entity\QCM[]', 'json');
        return $qcms;
    }

    public function deserializeFromJSON($json) {
        $encoders = [new JsonEncoder()];
        $extractor = new PropertyInfoExtractor([], [new PhpDocExtractor(), new ReflectionExtractor()]);
        $normalizers = [new ArrayDenormalizer(), new ObjectNormalizer(null, null, null, $extractor)];
        $serializer = new Serializer($normalizers, $encoders);
        $qcms = $serializer->deserialize($json, QCM::class, 'json');
        dd($qcms);
        return $qcms;
    }
}
