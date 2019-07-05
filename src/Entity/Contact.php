<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @Assert\NotNull
     */
    private $id;

    /**
     * @Assert\NotBlank
     */
    private $firstname;

    /**
     * @Assert\NotBlank
     */
    private $lastname;

    /**
     * @Assert\NotBlank
     */
    private $firm;

    /**
     * @Assert\Email
     * @assert\NotBlank
     */
    private $email;

    /**
     * @Assert\NotBlank
     */
    private $tel;

    /**
     * @Assert\NotBlank
     */
    private $message;

    /**
     * @Assert\NotBlank
     */
    private $object;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirm(): ?string
    {
        return $this->firm;
    }

    public function setFirm(string $firm): self
    {
        $this->firm = $firm;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getObject(): ?string
    {
        return $this->object;
    }

    public function setObject(string $object): self
    {
        $this->object = $object;

        return $this;
    }
}
