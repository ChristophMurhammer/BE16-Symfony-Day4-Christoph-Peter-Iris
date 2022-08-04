<?php

namespace App\Entity;

use App\Repository\GearRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GearRepository::class)]
class Gear
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    private ?string $gearName = null;

    #[ORM\Column(length: 100)]
    private ?string $gearType = null;

    #[ORM\Column(length: 55)]
    private ?string $gearProducer = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: 2)]
    private ?string $gearPrice = null;

    #[ORM\ManyToOne]
    private ?Beginner $fkBeginner = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $gear_image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGearName(): ?string
    {
        return $this->gearName;
    }

    public function setGearName(string $gearName): self
    {
        $this->gearName = $gearName;

        return $this;
    }

    public function getGearType(): ?string
    {
        return $this->gearType;
    }

    public function setGearType(string $gearType): self
    {
        $this->gearType = $gearType;

        return $this;
    }

    public function getGearProducer(): ?string
    {
        return $this->gearProducer;
    }

    public function setGearProducer(string $gearProducer): self
    {
        $this->gearProducer = $gearProducer;

        return $this;
    }

    public function getGearPrice(): ?string
    {
        return $this->gearPrice;
    }

    public function setGearPrice(string $gearPrice): self
    {
        $this->gearPrice = $gearPrice;

        return $this;
    }

    public function getFkBeginner(): ?beginner
    {
        return $this->fkBeginner;
    }

    public function setFkBeginner(?beginner $fkBeginner): self
    {
        $this->fkBeginner = $fkBeginner;

        return $this;
    }

    public function getGearImage(): ?string
    {
        return $this->gear_image;
    }

    public function setGearImage(?string $gear_image): self
    {
        $this->gear_image = $gear_image;

        return $this;
    }
}
