<?php

namespace App\Services;

use App\Entity\Favorite;
use App\Repository\FavoriteRepository;
use Doctrine\ORM\EntityManagerInterface;


class FavoriteService
{
    private $favoriteRepository;
    private $entityManager;

    public function __construct(FavoriteRepository $favoriteRepository, EntityManagerInterface $entityManager)
    {
        $this->favoriteRepository = $favoriteRepository;
        $this->entityManager = $entityManager;
    }

    public function addFavorite(Favorite $favorite)
    {
        $this->entityManager->persist($favorite);
        $this->entityManager->flush();
    }

    public function removeFavorite(Favorite $favorite)
    {
        $this->entityManager->remove($favorite);
        $this->entityManager->flush();
    }

    public function getFavoritesByUserId($userId)
    {
        return $this->favoriteRepository->findBy(['user' => $userId]);
    }
}

