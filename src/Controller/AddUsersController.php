<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddUsersController extends AbstractController
{
    #[Route("/add_users", name: "add_users")]
    public function index(): Response
    {
        return $this->render('add_users/add_users.html.twig', [
            'controller_name' => 'AddUsersController',
        ]);
    }
}