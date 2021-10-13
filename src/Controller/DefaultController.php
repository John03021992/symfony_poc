<?php

namespace App\Controller;

use App\Services\DefaultService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{


     public function __construct(
        protected DefaultService $service
    )
    {
        
    }

    #[Route('/default', name: 'default')]
    public function index(): Response
    {
        dump('test');

        

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'param2' => $this->service->test(),
        ]);
    }

    #[Route('/favorite', name: 'favorite')]
    public function favorite(): Response
    {
        $article = $this->service->randArticles(); 
        
        return $this->render('default/favorite.html.twig', [
            'controller_name' => 'DefaultController',
            'article' => $article,
        ]);
    }


    #[Route('/api', name: 'api')]
    public function api(): Response
    {
       

        $article = $this->service->randArticles(); 
        dump($article);
        
        return $this->render('default/api.html.twig', [
            'controller_name' => 'DefaultController',
            'param2' => $this->service->test(),
            'article' => $article,
        ]);
    }
    



    #[Route('/api2', name: 'api2')]
    public function api2(): Response
    {
       

        $article = $this->service->randArticles(); 
        dump($article);
        
        return $this->render('article.html.twig', [
           
            'article' => $article,
        ]);
    }
}
