<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\UsersAccount;

class GarageUserController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route("/garage-users", name: "garage_users")]
    public function index(): Response
    {
        $userRepository = $this->entityManager->getRepository(UsersAccount::class);
        $users = $userRepository->findAll();

        return $this->render('garage_user/garage_user.html.twig', [
            'users' => $users,
        ]);
    }
}
