<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Favorite;


class FavoriteController extends AbstractController
{
    public function addFavorite(): Response 
    {
        $entityManager = $this->getDoctrine()->getManager();


        $favorite = new Favorite();
        $favorite->setId($_POST['id']);
        $favorite->setTitle($_POST['title']);
        $favorite->setImageUrl($_POST['imageUrl']);

       
        $entityManager->persist($favorite);
        $entityManager->flush();

        return new Response('Saved new favorite with id '.$favorite->getId());

    }


    public function removeFavorite(): Response 
    {
        $entityManager = $this->getDoctrine()->getManager();

        $favorite = $entityManager->getRepository(Favorite::class)->find($_POST['id']);

        $entityManager->remove($favorite);
        $entityManager->flush();
        
        return new Response('Deleted favorite with id '.$favorite->getId());

    }

}