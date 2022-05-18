<?php

namespace App\Controller\Front;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\QCM;
use Psr\Log\LoggerInterface;
use App\Utils\ControllerUtils;

#[Route('/qcm')]
class QcmFrontController extends AbstractController {
    private function forwardTo(string $routename) {
        $routes = $this->get('router')->getRouteCollection();
        return $this->forward($routes->get($routename)->getDefaults()['_controller']);
    }

    #[Route('/mes_qcm', name: 'app_qcm_front_list')]
    public function list_qcm(ManagerRegistry $doctrine, LoggerInterface $logger): Response {
        $response = $this->forwardTo('app_list_qcm');
        $json = json_decode($response->getContent());
        return $this->render('page_utilisateur.html.twig', [
            'user_name' => 'Alicia',
            'qcm_list' => $json,
        ]);
    }

    //TODO: Route temp pour rediriger vers une page valide
    #[Route('/modif_qcm', name: 'app_qcm_front_update_temp')]
    public function update_qcm_temp(): Response {
        return $this->redirectToRoute('app_qcm_front_update', ['id' => 1]);
    }

    #[Route('/modif_qcm/{id}', name: 'app_qcm_front_update', requirements: ['id' => '\d+'])]
    public function update_qcm(int $id): Response {
        $session = $this->getUser();
        return $this->render("modif_qcm.html.twig", ['session' => $session, 'qcm_id' => $id]);
    }

    #[Route('/correction_qcm', name: 'app_qcm_front_mark')]
    public function mark_qcm(): Response {
        $session = $this->getUser();
        return $this->render("correction_qcm.html.twig", ['session' => $session]);
    }
}
