<?php

namespace App\Controller;

use App\Service\Apirecettes;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RecettesController extends AbstractController
{
    #[Route('/recettes', name: 'app_recettes')]
    public function index(Apirecettes $Apirecettes): Response
    {
        //dd($Apirecettes->fetchRecettes());
        return $this->render('recettes/index.html.twig', [    
            'APIrecettes' => $Apirecettes->fetchRecettes(),
        ]);
    }
}
