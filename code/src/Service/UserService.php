<?php

namespace App\Service;

use App\Repository\UserRepository;
use App\Entity\Utilisateur;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserService {
    public function __construct(
        ManagerRegistry $doctrine,
        UserRepository $userRepository,
        UserPasswordHasherInterface $passwordHasher,
    ) {
        $this->doctrine = $doctrine;
        $this->userRepository = $userRepository;
        $this->passwordHasher = $passwordHasher;
    }
    //TODO: Changer le nom à addUser
    public function addUser(string $mail, string $nom, string $prenom, string $password): void {
        $entityManager = $this->doctrine->getManager();
        $user = new Utilisateur();
        $user->setEmail($mail);

        $hashedPassword = $this->passwordHasher->hashPassword($user, $password);
        $user->setPassword($hashedPassword);

        $user->setRoles([]);
        $entityManager->persist($user);
        $entityManager->flush();
    }

    public function getAllUsers(): array {
        return $this->userRepository->findAll();
    }
}
