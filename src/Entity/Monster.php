<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\MonsterRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonsterRepository::class)]
#[ApiResource]
class Monster
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    public ?string $name = null;
}
