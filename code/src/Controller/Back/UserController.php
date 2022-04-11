<?php

namespace App\Controller\Back;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;
use App\Service\UserService;

#[Route("/api/user")]
class UserController extends AbstractController {
    #[Route("/", name: "app_user_new_user", methods: ['POST'])]
    public function add_new_user(Request $request, LoggerInterface $logger, UserService $userService): Response {
        $mail = $request->request->get('mail');
        $nom = $request->request->get('nom');
        $prenom = $request->request->get('prenom');
        $password = $request->request->get('password');
        $confirmPassword = $request->request->get('confirmPassword');

        if (strcmp($password, $confirmPassword) != 0) {
            return new Response('mdp différents');
        }

        $userService->add_user($mail, $nom, $prenom, $password);
        return new Response('ok');
    }
}

