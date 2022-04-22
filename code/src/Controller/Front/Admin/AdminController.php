<?php

namespace App\Controller\Front\Admin;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\UserService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[Route('/admin')]
#[IsGranted('ROLE_ADMIN')]
class AdminController extends AbstractController {
    #[Route('/utilisateurs', name: 'app_admin_front_users')]
    public function users(UserService $userService): Response {
        $users = $userService->getAllUsers();
        $session = $this->getUser();
        return $this->render('liste_utilisateur.html.twig', ['users' => $users, 'session' => $session]);
    }

    #[Route('/utilisateurs/nouveau', name: 'app_admin_front_new_user')]
    public function new_user(): Response {
        $session = $this->getUser();
        return $this->render('creation_utilisateur.html.twig', ['session' => $session]);
    }

    #[Route('/utilisateurs/modif', name: 'app_admin_front_user')]
    public function user_profile(): Response {
        $session = $this->getUser();
        return $this->render('modif_utilisateur.html.twig', ['session' => $session]);
    }
}
