<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomCLI;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomCLI;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;



  

    public function getNomCLI(): ?string
    {
        return $this->nomCLI;
    }

    public function setNomCLI(string $nomCLI): self
    {
        $this->nomCLI = $nomCLI;

        return $this;
    }

    public function getPrenomCLI(): ?string
    {
        return $this->prenomCLI;
    }

    public function setPrenomCLI(string $prenomCLI): self
    {
        $this->prenomCLI = $prenomCLI;

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
    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $Id): self
    {
        $this->id = $Id;

        return $this;
    }


}
