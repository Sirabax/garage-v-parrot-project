<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\UsersAccount; // Make sure to import the correct namespace

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
        // Fetch all data from the "UsersAccount" entity
        $userRepository = $this->entityManager->getRepository(UsersAccount::class);
        $users = $userRepository->findAll();

        // You can pass the $users variable to a template to display or return it as JSON
        // For example, to render a template:
        return $this->render('garage_user/garage_user.html.twig', [
            'users' => $users,
        ]);
    }
}
