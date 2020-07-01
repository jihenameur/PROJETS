<?php

namespace App\Entity;

use App\Repository\FournisseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FournisseurRepository::class)
 */
class Fournisseur
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
    private $nomFs;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;


    public function getId(): ?int
    {
        return $this->id;
    }



    public function getVille(): ?string
    {
        return $this->ville;
    }

    
    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function getNomFs(): ?string
    {
        return $this->nomFs;
    }
    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }
    public function setNomFs(string $nomFs): self
    {
        $this->nomFs = $nomFs;

        return $this;
    }
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

   
}
