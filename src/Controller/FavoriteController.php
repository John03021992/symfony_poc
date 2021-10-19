<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Favorite;
use App\Services\FavoriteService;
use Symfony\Component\Routing\Annotation\Route;


class FavoriteController extends AbstractController
{

    private $favoriteService;

    


    public function __construct(
        protected FavoriteService $service
    )
    {
        $this->favoriteService = $service;
    }

    #[Route('/addfavorite', name: 'addfavorite')]
    public function addFavorite(Request $request): Response 
    {
        $entityManager = $this->getDoctrine()->getManager();


        $favorite = new Favorite();
        $favorite->setTitle($request->query->get('title'));
        $favorite->setImageUrl($request->query->get('imageUrl'));
        $favorite->setUser($this->getUser());

       
        $this->favoriteService->addFavorite($favorite);
        

        return new Response('Saved new favorite with id '.$favorite->getId().' with user'.$this->getUser());

    }


    public function removeFavorite(): Response 
    {
        $entityManager = $this->getDoctrine()->getManager();

        $favorite = $entityManager->getRepository(Favorite::class)->find($_POST['id']);

        $this->favoriteService->removeFavorite($favorite);
        
        return new Response('Deleted favorite with id '.$favorite->getId());

    } 
 
}
