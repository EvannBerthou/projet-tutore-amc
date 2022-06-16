<?php

namespace App\Repository;

use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository {
    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Utilisateur::class);
    }

    public function deleteUser(int $id) {
        $user = $this->find($id);
        $entityManager = $this->getEntityManager();
        $entityManager->remove($user);
        $entityManager->flush();
    }
}
