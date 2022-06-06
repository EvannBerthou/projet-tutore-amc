<?php

namespace App\Controller\Front;

use App\Entity\Utilisateur;
use App\Utils\QcmUtils;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\QCM;
use Psr\Log\LoggerInterface;
use App\Utils\ControllerUtils;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

#[Route('/qcm')]
#[IsGranted('ROLE_USER')]
class QcmFrontController extends AbstractController {
    private QcmUtils $qcmUtils;

    public function __construct(QcmUtils $qcmUtils) {
        $this->qcmUtils = $qcmUtils;
    }

    private function forwardTo(string $routename) {
        $routes = $this->get('router')->getRouteCollection();
        return $this->forward($routes->get($routename)->getDefaults()['_controller'], [
            'user' => $this->getUser()
        ]);
    }

    #[Route('/mes_qcm', name: 'app_qcm_front_list')]
    public function list_qcm(ManagerRegistry $doctrine, LoggerInterface $logger): Response {
        $session = $this->getUser();
        $response = $this->forwardTo('app_list_qcm');
        $qcms = $this->qcmUtils->deserialize($response);
        return $this->render('page_utilisateur.html.twig', [
            'session' => $session, 
            'qcm_list' => $qcms,
        ]);
    }

    #[Route('/modif_qcm', name: 'app_qcm_new')]
    public function newQCM(): Response {
        $id = $this->qcmUtils->getNextId();
        return $this->redirectToRoute('app_qcm_front_update', ['id' => $id]);
    }

    #[Route('/modif_qcm/{id}', name: 'app_qcm_front_update', requirements: ['id' => '\d+'])]
    public function updateQCM(int $id): Response {
        /** @var Utilisateur $session */
        $session = $this->getUser();
        $qcm = $this->qcmUtils->getQcm($id);
    
        if ($qcm !== null && $qcm->getUser()->getId() !== $session->getId()) {
            throw new AccessDeniedHttpException("Vous n'êtes pas le propriétaire de ce QCM");
        }

        if ($qcm === null) {
            $qcm = new QCM();
        }

        return $this->render("modif_qcm_new.html.twig", [
            'session' => $session, 
            'qcm_id' => $id, 
            'qcm' => $qcm
        ]);
    }

    #[Route('/correction_qcm', name: 'app_qcm_front_mark')]
    public function mark_qcm(): Response {
        $session = $this->getUser();
        return $this->render("correction_qcm.html.twig", ['session' => $session]);
    }
}
