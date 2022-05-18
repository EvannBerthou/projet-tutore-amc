<?php

namespace App\Repository;

use App\Entity\QCM;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class QCMRepository extends ServiceEntityRepository {
    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, QCM::class);
    }

    public function getMaxId(): int {
        $entityManager = $this->getEntityManager();
        return $entityManager
            ->createQuery('SELECT MAX(q.id) FROM App\Entity\QCM q')
            ->getSingleScalarResult();
    }
}
