<?php

namespace App\Controller;

use App\Entity\Pet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    #[Route('/', name: 'app')]
    public function index(): Response
    {
        $pet = new Pet();
        $pet->setName('pierre');
        $pet->setAge(10);
//        dump and died
//        dd($pet);

        return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }
}
