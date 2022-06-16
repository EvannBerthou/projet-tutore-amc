<?php

namespace App\Controller\Front\Admin;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\UserService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[Route('/admin')]
#[IsGranted('ROLE_ADMIN')]
class AdminController extends AbstractController {
    private $UserRepository;

    public function __construct(UserRepository $UserRepository) {
        $this->UserRepository = $UserRepository;
    }

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

    #[Route('/utilisateurs/modif/{id}', name: 'app_admin_front_user')]
    public function user_profile(int $id): Response {
        $session = $this->getUser();
        $user = $this->UserRepository->find($id);
        return $this->render('modif_utilisateur.html.twig', ['session' => $session, 'user' => $user, 'id' => $id]);
    }

    #[Route('/utilisateurs/delete/{id}', name: 'app_admin_delete_user')]
    public function deleteUser(int $id): Response {
        $this->UserRepository->deleteUser($id);
        return $this->redirectToRoute("app_admin_front_users");
    }
}
