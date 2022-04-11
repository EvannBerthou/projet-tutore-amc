<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\QCMRepository;

#[ORM\Entity(repositoryClass: QCMRepository::class)]
class QCM {
    #[ORM\Id()]
    #[ORM\GeneratedValue()]
    #[ORM\Column(type:"integer")]
    private $id;

    #[ORM\Column(type:"string", length:255)]
    private $titre;

    #[ORM\Column(type:"datetime")]
    private $date;

    #[ORM\OneToMany(targetEntity: Question::class, mappedBy: "qcm")]
    private $questions;

    public function getId(): ?int {
        return $this->id;
    }

    public function titre(): string {
        return $this->titre;
    }
}
