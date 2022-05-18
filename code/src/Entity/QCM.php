<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\QCMRepository;

#[ORM\Entity(repositoryClass: QCMRepository::class)]
class QCM {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $titre;

    #[ORM\Column(type: 'datetime')]
    private $date;

    #[ORM\OneToMany(targetEntity: Question::class, mappedBy: 'qcm')]
    private $questions;

    public function __construct() {
        $this->questions = new ArrayCollection();   
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function titre(): string {
        return $this->titre;
    }

    public function getQuestions() {
        return $this->questions->getValues();
    }

    public function toAMCTXT(): string {
        $data = <<<HERODOC
        PaperSize: A4
        Lang: FR
        Title: $this->titre
        Presentation: Veuillez répondre aux questions ci-dessous du mieux que vous pouvez.

        HERODOC;

        foreach ($this->getQuestions() as $question) {
            $data .= "* {$question->getEnonce()}\n";
            foreach ($question->getReponses() as $reponse) {
                $prefix = $reponse->isCorrect() ? "+" : "-";
                $data .= "$prefix {$reponse->getTexte()}\n";
            }
        }

        //return "** question 1\n+ réponse 1\n- réponse 2\n\n* question 2\n- réponse 1\n+ réponse 2";
        return $data;
    }
}
