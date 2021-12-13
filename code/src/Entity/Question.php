<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

// TODO: Ajouter le repository
//#[ORM\Entity(repositoryClass=ProductRepository::class)]
//
#[ORM\Entity()]
class Question {

    #[ORM\Id()]
    #[ORM\GeneratedValue()]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\Column(type: "string", length: 255)]
    private $enonce;

    #[ORM\ManyToOne(targetEntity: QCM::class, inversedBy: "questions")]
    private $qcm;

    public function getId(): ?int {
        return $this->id;
    }
}
