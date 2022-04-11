<?php

namespace App\Service;

use App\Repository\UserRepository;
use App\Entity\Utilisateur;
use Doctrine\Persistence\ManagerRegistry;

class UserService {
    public function __construct(ManagerRegistry $doctrine) {
        $this->doctrine = $doctrine;
    }
    public function add_user(string $mail, string $nom, string $prenom, string $password): void {
        $entityManager = $this->doctrine->getManager();
        $user = new Utilisateur();
        $user->setEmail($mail);
        $user->setPassword($password);
        $user->setRoles([]);
        $entityManager->persist($user);
        $entityManager->flush();
    }
}
