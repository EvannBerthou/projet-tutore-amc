<?php

namespace App\Entity;

use App\Repository\ReponseRepository;
use Doctrine\ORM\Mapping as ORM;

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

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getTexte(): ?string {
        return $this->texte;
    }

    public function setTexte(string $texte) {
        $this->texte = $texte;
    }

    public function isCorrect(): bool {
        return $this->estCorrect;
    }

    public function setEstCorrect(bool $estCorrect) {
        $this->estCorrect = $estCorrect;
    }

    public function setQuestion($question) {
        $this->question = $question;
    }

    public function getQuestion() {
        return $this->question;
    }

    public function toAMCTXT(): string {
        $prefix = $this->isCorrect() ? "+" : "-";
        return "$prefix {$this->getTexte()}\n";
    }
}
