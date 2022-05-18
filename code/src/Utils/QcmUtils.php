<?php

namespace App\Utils;

use App\Entity\QCM;
use App\Repository\QCMRepository;
use Exception;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Response;

class QcmUtils {
    private $QCMRepository;

    public function __construct(QCMRepository $QCMRepository) {
        $this->QCMRepository = $QCMRepository;
    }

    public function getQcm(int $id): QCM {
        $qcm = $this->QCMRepository->find($id);
        if (!$qcm) {
            throw new Exception("Le QCM avec l'id \'" . $id . "\' n'existe pas");
        }
        return $qcm;
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
}
