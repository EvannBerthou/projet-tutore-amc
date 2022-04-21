<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\QuestionImageRepository;

#[ORM\Entity(repositoryClass: QuestionImageRepository::class)]
class QuestionImage {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(name: 'path', type: 'string', nullable: false)]
    private $path;
}
