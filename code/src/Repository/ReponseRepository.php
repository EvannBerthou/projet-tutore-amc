<?php

namespace App\Repository;

use App\Entity\Reponse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ReponseRepository extends ServiceEntityRepository {
    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Reponse::class);
    }

    public function saveReponse($reponse) {
        $entityManager = $this->getEntityManager();
        if ($reponse->getId() === 0) {
            $entityManager->persist($reponse);
        } else {
            $entityManager->merge($reponse);
        }
    }

    public function deleteReponse($reponse) {
        $reponseBD = $this->find($reponse);
        $entityManager = $this->getEntityManager();
        $entityManager->remove($reponseBD);
        $entityManager->flush();
    }
}
