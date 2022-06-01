<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\ReponseRepository;

#[ORM\Entity(repositoryClass: ReponseRepository::class)]
class Reponse {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[Orm\ManyToOne(targetEntity: Question::class, inversedBy: 'reponses')]
    private $question;

    #[ORM\Column(type: 'boolean')]
    private $estCorrect;

    #[ORM\Column(type: 'string')]
    private $texte;

    public function getId(): ?int {
        return $this->id;
    }

    public function getTexte(): string {
        return $this->texte;
    }

    public function isCorrect(): bool {
        return $this->estCorrect;
    }

    public function toAMCTXT(): string {
        $prefix = $this->isCorrect() ? "+" : "-";
        return "$prefix {$this->getTexte()}\n";
    }
}
