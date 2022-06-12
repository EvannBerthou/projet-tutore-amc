<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\QuestionRepository;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[Orm\ManyToOne(targetEntity: QCM::class, inversedBy: 'questions')]
    private $qcm;

    #[ORM\Column(type: 'string', length: 255)]
    private $enonce;

    #[ORM\OneToMany(targetEntity: Reponse::class, mappedBy: 'question', cascade:["persist"])]
    private $reponses;

    #[ORM\Column(name: 'type', type: 'string', length: 255, nullable: false)]
    private $type;

    #[ORM\OneToOne(targetEntity: 'QuestionOptions')]
    private $options;

    #[ORM\OneToOne(targetEntity: 'QuestionImage')]
    #[ORM\JoinColumn(nullable: true)]
    private $image;

    public function __construct() {
        $this->reponses = new ArrayCollection();
    }

    public function setType($type) {
        if (!in_array($type, QuestionTypeEnum::getAvailableTypes())) {
            throw new \InvalidArgumentException('Type invalide');
        }

        $this->type = $type;
        return $this;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getEnonce(): ?string {
        return $this->enonce;
    }

    public function setEnonce(string $enonce) {
        $this->enonce = $enonce;
    }

    public function getReponses() {
        return $this->reponses->getValues();
    }

    public function getReponsesArray() {
        return $this->reponses;
    }

    public function setReponses($reponses) {
        $this->reponses = new ArrayCollection($reponses);
        $i = 0;
        foreach ($this->getReponses() as $reponse) {
            $i += $reponse->isCorrect();
        }
        if ($i == 0) $this->type = 'ouverte';
        else if ($i == 1) $this->type = 'simple';
        else $this->type = 'multiple';
    }

    public function toAMCTXT(): string {
        $str = $this->getEnonceWithPrefix() . "\n";
        foreach ($this->getReponses() as $reponse) {
            $str .= $reponse->toAMCTXT();
        }
        return $str . "\n";
    }

    public function setQCM($qcm) {
        $this->qcm = $qcm;
    }

    private function getEnonceWithPrefix(): string {
        return match ($this->type) {
            QuestionTypeEnum::TYPE_SIMPLE => "* {$this->enonce}",
            QuestionTypeEnum::TYPE_MULTIPLE => "** {$this->enonce}",
            QuestionTypeEnum::TYPE_OUVERTE => "*<lines=4>{$this->enonce}\n-[0]{0} O\n-[P]{1} P\n+[V]{2} V",
            default => "*"
        };
    }

    public function __toString() {
        return $this->id;
    }
}
