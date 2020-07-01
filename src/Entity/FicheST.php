<?php

namespace App\Entity;

use App\Repository\FicheSTRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FicheSTRepository::class)
 */
class FicheST
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
    private $DATE;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $operation;

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDATE(): ?string
    {
        return $this->DATE;
    }

    public function setDATE(string $DATE): self
    {
        $this->DATE = $DATE;

        return $this;
    }

    public function getOperation(): ?string
    {
        return $this->operation;
    }

    public function setOperation(string $operation): self
    {
        $this->operation = $operation;

        return $this;
    }

  
}
