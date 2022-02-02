<?php

namespace App\Controller\Front;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\QCM;

#[Route("/qcm")]
class QcmFrontController extends AbstractController {
    #[Route("/mes_qcm", name:"app_qcm_front_list")]
    public function list_qcm(ManagerRegistry $doctrine): Response {
        $qcm_list = $doctrine->getRepository(QCM::class)->findAll();
        $qcm_list = ['TEMP'];
        return $this->render("page_utilisateur.html.twig", ['user_name' => "Alicia", 'qcm_list' => $qcm_list]);
    }


    #[Route("/modif_qcm", name:"app_qcm_front_update")]
    public function update_qcm(): Response {
        $response = new Response();
        return $response->setContent("Modif QCM");
    }


    #[Route("/correction_qcm", name:"app_qcm_front_mark")]
    public function mark_qcm(): Response {
        $response = new Response();
        return $response->setContent("Correction QCM");
    }
}