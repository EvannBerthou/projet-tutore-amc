<?php

namespace App\Controller\Back;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Utils\QcmUtils;

#[Route("/api/qcm")]
class QcmController extends AbstractController {
    private $qcmUtils;

    public function __construct(QcmUtils $qcmUtils) {
        $this->qcmUtils = $qcmUtils;
    }

    #[Route("/generate", name: "app_generate_qcm")]
    public function generate_qcm(): Response {
        // TODO: Charger les données du QCM depuis la BD
        $content = $this->qcmUtils->generate_qcm(
            "** question 1\n+ réponse 1\n- réponse 2\n\n* question 2\n- réponse 1\n+ réponse 2"
        );
        return $this->qcmUtils->create_qcm_file_to_send("file.pdf", $content);
    }
}
