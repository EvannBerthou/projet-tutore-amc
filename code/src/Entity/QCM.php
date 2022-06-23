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

    #[ORM\OneToMany(targetEntity: Question::class, mappedBy: 'qcm', cascade:["persist", "remove"])]
    private $questions;

    #[Orm\ManyToOne(targetEntity: Utilisateur::class, inversedBy: 'qcms')]
    #[Ignore]
    private $user;

    public function __construct() {
        $this->questions = new ArrayCollection();   
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getTitre(): string {
        return $this->titre;
    }

    public function setTitre(string $titre) {
        $this->titre = $titre;
    }

    public function getDate() {
        return $this->date;
    }

    //TODO: Voir pourquoi ce n'est plus un DateTime à ce moment
    public function creationDateString() {
        return date("d/m/Y", $this->date["timestamp"]);
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getQuestions() {
        return $this->questions->getValues();
    }

    public function getQuestionsArray() {
        return $this->questions;
    }

    public function setQuestions($questions) {
        $this->questions = $questions;
    }

    public function addQuestion($question) {
        $this->questions->add($question);
    }

    public function getUser() {
        return $this->user;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function toAMCTXT(): string {
        $data = <<<HERODOC
        PaperSize: A4
        Lang: FR
        Title: $this->titre
        SeparateAnswerSheet: 1
        Columns: 2
        AnswerSheetColumns: 2
        Presentation: Veuillez répondre aux questions ci-dessous du mieux que vous pouvez.

        HERODOC;

        foreach ($this->getQuestions() as $question) {
            $data .= $question->toAMCTXT();
        }

        //return "** question 1\n+ réponse 1\n- réponse 2\n\n* question 2\n- réponse 1\n+ réponse 2";
        return $data;
    }

    public function __toString() {
        return $this->titre;
    }
}
