<?php

namespace App\Utils;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Response;

class QcmUtils {
    public function generate_qcm(String $data) : String {
        $process = new Process(['sh', 'scripts/test.sh', $data]);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return $process->getOutput();
    }

    public function create_qcm_file_to_send(String $filename, String $content) : Response{
        $response = new Response();
        $response->headers->set('Content-Disposition', 'attachment; filename="'.$filename.'";');
        $response->headers->set('Content-length', strlen($content));
        $response->sendHeaders();
        $response->setContent($content);
        return $response;
    }
}
