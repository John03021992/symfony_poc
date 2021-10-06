<?php

namespace App\Services;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultService
{
    public function __construct()
    {
        
    }

    public function test(){
        return 'User';
    }

    function callapi($url, $param, $method='GET'){
        $curl = curl_init();

         // set url
         curl_setopt($curl, CURLOPT_URL, $url); // setopt : Définit une option de transmission cURL

         switch ($method)
         {
             case "POST": 
                 curl_setopt($curl, CURLOPT_POST, 1); // CURLOPT POST : True pour que PHP fasse un HTTP POST régulier
     
                 if ($param)
                     curl_setopt($curl, CURLOPT_POSTFIELDS, $param); // POSTFIELD : Toutes les données à passer lors d'une opération de HTTP POST
                 break;
             
             default:
                 if ($param)
                     $url = sprintf("%s?%s", $url, http_build_query($param)); // BUILD QUERY : Génère une chaîne de requête en encodage URL
         }

         curl_setopt($curl, CURLOPT_URL, $url);
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

         $result = curl_exec($curl);

         curl_close($curl);
     
         return $result;

         
    }

    public function randArticles(){

        $nbArticles = 10761; // Dans un 2 eme temps, récup le nb d'articles avec Count 
        $nbRandom = random_int(0, $nbArticles);
        $url = "https://api.spaceflightnewsapi.net/v3/articles/".$nbRandom;
        $result = $this-> callapi($url, NULL);// une methode c'est une fonction à l'intérieur d'une classe 
        

        return $result;


    }        

}


