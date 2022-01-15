<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

// TODO: Ajouter le repository
//#[ORM\Entity(repositoryClass=ProductRepository::class)]
//
#[ORM\Entity()]
class Reponse {
    #[ORM\Id()]
    #[ORM\GeneratedValue()]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\Column(type: "boolean")]
    private $estCorrect;

    #[ORM\Column(type: "string")]
    private $texte;

    public function getId(): ?int {
        return $this->id;
    }
}
