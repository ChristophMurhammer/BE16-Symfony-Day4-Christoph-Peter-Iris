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
    private ?string $beginnerfriendly = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBeginnerfriendly(): ?string
    {
        return $this->beginnerfriendly;
    }

    public function setBeginnerfriendly(?string $beginnerfriendly): self
    {
        $this->beginnerfriendly = $beginnerfriendly;

        return $this;
    }
}
