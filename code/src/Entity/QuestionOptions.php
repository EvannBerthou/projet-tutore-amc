<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\boolean;
use App\Repository\QuestionOptionsRepository;

#[ORM\Entity(repositoryClass: QuestionOptionsRepository::class)]
class QuestionOptions {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(name: 'horizontal', type: 'boolean', nullable: false, options: ['default' => '1'])]
    private boolean $horizontal;

    #[ORM\Column(name: 'columns', type: 'smallint', nullable: false, options: ['default' => '1'])]
    private int $columns;

    #[ORM\Column(name: 'ordered', type: 'boolean', nullable: false, options: ['default' => '1'])]
    private boolean $ordered;

    #[ORM\Column(name: 'indicative', type: 'boolean', nullable: false, options: ['default' => '0'])]
    private boolean $indicative;

    #[ORM\Column(name: 'next', type: 'boolean', nullable: false, options: ['default' => '0'])]
    private boolean $next;

    #[ORM\Column(name: 'first', type: 'boolean', nullable: false, options: ['default' => '0'])]
    private boolean $first;

    #[ORM\Column(name: 'last', type: 'boolean', nullable: false, options: ['default' => '0'])]
    private boolean $last;

    #[ORM\Column(name: 'pointsBon', type: 'float', nullable: false, options: ['default' => '1.0'])]
    private float $pointsBon;

    #[ORM\Column(name: 'pointsMauvais', type: 'float', nullable: false, options: ['default' => '0.0'])]
    private float $pointsMauvais;
}
