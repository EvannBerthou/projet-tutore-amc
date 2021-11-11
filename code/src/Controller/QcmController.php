<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Utils\QcmUtils;

#[Route("/qcm")]
class QcmController extends AbstractController {
    /*
    private $qcmUtils;

    public function __construct(QcmUtils $qcmUtils) {
        $this->qcmUtils = $qcmUtils;
    }

    #[Route("/generate", name: "app_generate_qcm")]
    public function generate_qcm(): Response {
        $content = $this->qcmUtils->generate_qcm();
        return $this->qcmUtils->create_qcm_file_to_send("file.pdf", $content);
    }
    */

    #[Route("/test")]
    public function test() : Response {
        return new Response('OK2');
    }
}
