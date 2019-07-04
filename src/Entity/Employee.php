<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmployeeRepository")
 * @Vich\Uploadable
 */
class Employee
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
    private $lastname;

    /**
     * @Assert\Length(max=255)
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @Assert\Length(max=14)
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel;

    /**
     * @Assert\Length(max=255)
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @Assert\Length(max=255)
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $picture;

    /**
     * @Assert\File(maxSize = "200k")
     * @Assert\Length(max=255)
     * @Vich\UploadableField(mapping="employee", fileNameProperty="picture")
     * @var File
     */
    private $pictureFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @Assert\Length(max=1500)
     * @Assert\NotNull()
     * @ORM\Column(type="text")
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
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

    public function setPictureFile(File $picture = null)
    {
        $this->pictureFile = $picture;

        if ($picture) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getPictureFile()
    {
        return $this->pictureFile;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
