<?php

namespace App\Entity;

use App\Repository\FavoriteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FavoriteRepository::class)
 */
class Favorite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $addFavorite;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="favorites")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddFavorite(): ?string
    {
        return $this->addFavorite;
    }

    public function setAddFavorite(string $addFavorite): self
    {
        $this->addFavorite = $addFavorite;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
