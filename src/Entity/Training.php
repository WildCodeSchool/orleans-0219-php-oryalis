<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrainingRepository")
 */
class Training
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\Length(max=255)
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @Assert\Length(max=255)
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=255)
     */
    private $period;

    /**
     * @Assert\Length(max=255)
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=255)
     */
    private $public;

    /**
     * @Assert\Length(max=255)
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=255)
     */
    private $pedagogy;

    /**
     * @Assert\Length(max=255)
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=255)
     */
    private $trainer;

    /**
     * @Assert\NotNull()
     * @ORM\Column(type="text")
     */
    private $program;

    /**
     * @Assert\NotNull()
     * @ORM\Column(type="text")
     */
    private $goal;

    /**
     * @Assert\Length(max=255)
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=255)
     */
    private $prerequisite;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPeriod(): ?string
    {
        return $this->period;
    }

    public function setPeriod(string $period): self
    {
        $this->period = $period;

        return $this;
    }

    public function getPublic(): ?string
    {
        return $this->public;
    }

    public function setPublic(string $public): self
    {
        $this->public = $public;

        return $this;
    }

    public function getPedagogy(): ?string
    {
        return $this->pedagogy;
    }

    public function setPedagogy(string $pedagogy): self
    {
        $this->pedagogy = $pedagogy;

        return $this;
    }

    public function getTrainer(): ?string
    {
        return $this->trainer;
    }

    public function setTrainer(string $trainer): self
    {
        $this->trainer = $trainer;

        return $this;
    }

    public function getProgram(): ?string
    {
        return $this->program;
    }

    public function setProgram(string $program): self
    {
        $this->program = $program;

        return $this;
    }

    public function getGoal(): ?string
    {
        return $this->goal;
    }

    public function setGoal(string $goal): self
    {
        $this->goal = $goal;

        return $this;
    }

    public function getPrerequisite(): ?string
    {
        return $this->prerequisite;
    }

    public function setPrerequisite(string $prerequisite): self
    {
        $this->prerequisite = $prerequisite;

        return $this;
    }
}
