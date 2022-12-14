<?php

namespace App\Entity;

use App\Repository\BeginnerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BeginnerRepository::class)]
class Beginner
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $friendly = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFriendly(): ?string
    {
        return $this->friendly;
    }

    public function setFriendly(?string $friendly): self
    {
        $this->friendly = $friendly;

        return $this;
    }
}
