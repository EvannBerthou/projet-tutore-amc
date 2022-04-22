<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\QuestionRepository;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $enonce;

    #[ORM\ManyToOne(targetEntity: Reponse::class, inversedBy: 'questions')]
    private $qcm;

    #[ORM\Column(name: 'type', type: 'string', length: 255, nullable: false)]
    private $type;

    #[ORM\OneToOne(targetEntity: 'QuestionOptions')]
    private $options;

    #[ORM\OneToOne(targetEntity: 'QuestionImage')]
    #[ORM\JoinColumn(nullable: true)]
    private $image;

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
}
