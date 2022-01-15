<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
class QuestionImage {
    #[ORM\Id()]
    #[ORM\GeneratedValue()]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\Column(name: "path", type: "string", nullable: false)]
    private $path;
}
