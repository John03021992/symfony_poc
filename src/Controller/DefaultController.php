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

    #[Route('/index2', name: 'index2')]
    public function index2(): Response
    {
        

       

        return $this->render('default/index2.html.twig', [
            'controller_name' => 'DefaultController',
            'param2' => $this->service->test(),
        ]);
    }

    #[Route('/index3', name: 'index3')]
    public function index3(): Response
    {
       

      

        return $this->render('default/index3.html.twig', [
            'controller_name' => 'DefaultController',
            'param2' => $this->service->test(),
        ]);
    }

    #[Route('/index4', name: 'index4')]
    public function index4(): Response
    {
        dump('test');

        return $this->render('default/index4.html.twig', [
            'controller_name' => 'DefaultController',
            'param2' => $this->service->test(),
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
