<?php

namespace App\Repository;

use App\Entity\Question;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class QuestionRepository extends ServiceEntityRepository {
    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Question::class);
    }

    public function saveQuestion($question) {
        $entityManager = $this->getEntityManager();
        if ($question->getId() === 0) {
            $entityManager->persist($question);
        } else {
            $entityManager->merge($question);
        }
        $entityManager->flush();
    }
}
