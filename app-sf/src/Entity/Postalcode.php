<?php

namespace App\Entity;

use App\Repository\PostalcodeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostalcodeRepository::class)]
class Postalcode
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $Logradouro = null;

    #[ORM\Column(length: 50)]
    private ?string $bairro = null;

    #[ORM\Column(length: 50)]
    private ?string $localidade = null;

    #[ORM\Column(length: 50)]
    private ?string $estado = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogradouro(): ?string
    {
        return $this->Logradouro;
    }

    public function setLogradouro(string $Logradouro): static
    {
        $this->Logradouro = $Logradouro;

        return $this;
    }

    public function getBairro(): ?string
    {
        return $this->bairro;
    }

    public function setBairro(string $bairro): static
    {
        $this->bairro = $bairro;

        return $this;
    }

    public function getLocalidade(): ?string
    {
        return $this->localidade;
    }

    public function setLocalidade(string $localidade): static
    {
        $this->localidade = $localidade;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): static
    {
        $this->estado = $estado;

        return $this;
    }
}
