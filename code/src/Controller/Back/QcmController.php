<?php

namespace App\Controller\Back;

use App\Entity\Utilisateur;
use App\Repository\QCMRepository;
use App\Utils\QcmUtils;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\QCM;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

#[Route('/api/qcm')]
#[IsGranted('ROLE_USER')]
class QcmController extends AbstractController {
    private QcmUtils $qcmUtils;
    private QCMRepository $QCMRepository;

    public function __construct(QcmUtils $qcmUtils, QCMRepository $QCMRepository) {
        $this->qcmUtils = $qcmUtils;
        $this->QCMRepository = $QCMRepository;
    }

    #[Route('/generate/{id}', name: 'app_generate_qcm', requirements: ['id' => '\d+'])]
    public function generate_qcm(int $id): Response {
        $qcm = $this->qcmUtils->getQcm($id);

        if (!$qcm) {
            throw new Exception("Le QCM avec l'id \'" . $id . "\' n'existe pas");
        }

        $content = $this->qcmUtils->generate_qcm($qcm);
        return $this->qcmUtils->create_qcm_file_to_send('file.pdf', $content);
    }

    #[Route('/list', name: 'app_list_qcm')]
    public function list_qcm(Utilisateur $user): JsonResponse {
        $qcms = $this->QCMRepository->getQCMsOfUser($user->getId());
        return new JsonResponse($this->qcmUtils->serialize($qcms));
    }
}
