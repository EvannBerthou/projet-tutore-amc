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

    #[Orm\ManyToOne(targetEntity: QCM::class, inversedBy: 'qcm')]
    private $qcm;

    #[ORM\Column(type: 'string', length: 255)]
    private $enonce;

    #[ORM\OneToMany(targetEntity: Reponse::class, mappedBy: 'question')]
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

    public function getEnonce(): string {
        return $this->enonce;
    }

    public function getReponses() {
        return $this->reponses->getValues();
    }
}
