<?php

namespace App\Controller\Back;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;
use App\Service\UserService;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

#[Route('/api/user')]
class UserController extends AbstractController {
    #[Route('/', name: 'app_user_new_user', methods: ['POST'])]
    public function addNewUser(Request $request, LoggerInterface $logger, UserService $userService): Response {
        $mail = $request->request->get('mail');
        $nom = $request->request->get('nom');
        $prenom = $request->request->get('prenom');
        $password = $request->request->get('password');
        $confirmPassword = $request->request->get('confirmPassword');

        //TODO: Renvoyer un message d'erreur
        if (strcmp($password, $confirmPassword) != 0) {
            return new Response('mdp différents');
        }

        $userService->addUser($mail, $nom, $prenom, $password);
        //TODO: Rediriger vers la liste des utilisateurs
        return $this->redirectToRoute('app_admin_front_users');
    }

    #[Route('/login', name: 'app_user_login')]
    public function userLogin(AuthenticationUtils $authenticationUtils): Response {
        return new Response($authenticationUtils->getLastAuthenticationError());
    }

    #[Route('/logout', name: 'app_logout')]
    public function userLogout(AuthenticationUtils $authenticationUtils): Response {
        dd('Logout pas activé dans security.yaml');
    }
}
