<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{   
    
    #[Route('/', name: 'home')]
     
   
    public function home(): JsonResponse
    {
        return new JsonResponse(data: 'Bienvenue sur votre API Rest en symfony');
    }

    #[Route('/documentation' , name:'doc')]
    
    public function apiDoc():JsonResponse
    {
        return new JsonResponse(data:"Api Documentation Rest Full");
    }
}
