<?php

namespace App\Controller\Back;

use App\Repository\QCMRepository;
use App\Utils\QcmUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\QCM;

#[Route('/api/qcm')]
class QcmController extends AbstractController {
    private QcmUtils $qcmUtils;
    private QCMRepository $qcmRepository;

    public function __construct(QcmUtils $qcmUtils, QCMRepository $QCMRepository) {
        $this->qcmUtils = $qcmUtils;
        $this->qcmRepository = $QCMRepository;
    }

    #[Route('/generate', name: 'app_generate_qcm')]
    public function generate_qcm(): Response {
        // TODO: Charger les données du QCM depuis la BD
        $content = $this->qcmUtils->generate_qcm(
            "** question 1\n+ réponse 1\n- réponse 2\n\n* question 2\n- réponse 1\n+ réponse 2",
        );
        return $this->qcmUtils->create_qcm_file_to_send('file.pdf', $content);
    }

    #[Route('/list', name: 'app_list_qcm')]
    public function list_qcm(ManagerRegistry $doctrine): JsonResponse {
        dd($this->qcmRepository->findAll()[0]->getQuestions());
        return new JsonResponse([['data' => 1], ['data' => 2]]);
    }
}
