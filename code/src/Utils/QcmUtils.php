<?php

namespace App\Utils;

use App\Entity\QCM;
use App\Repository\QCMRepository;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class QcmUtils {
    private $QCMRepository;

    public function __construct(QCMRepository $QCMRepository) {
        $this->QCMRepository = $QCMRepository;
    }

    public function getQcm(int $id): QCM {
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

    public function serialize($qcms) {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
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
}
