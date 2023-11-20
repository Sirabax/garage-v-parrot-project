<?php

namespace App\Controller;

use App\Entity\UsersAccount;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Persistence\ManagerRegistry;

class AddUsersController extends AbstractController
{
    private UserPasswordHasherInterface $passwordHasher;
    private ManagerRegistry $doctrine;

    // Inject UserPasswordHasherInterface and ManagerRegistry into the constructor
    public function __construct(UserPasswordHasherInterface $passwordHasher, ManagerRegistry $doctrine)
    {
        $this->passwordHasher = $passwordHasher;
        $this->doctrine = $doctrine;
    }

    #[Route("/add_users", name: "add_users")]
    public function index(Request $request): Response
    {
        // Check if the user has ROLE_ADMIN
        if (!$this->isGranted('ROLE_ADMIN')) {
            // Redirect to the login page
            return $this->redirectToRoute('app_login');
        }

        // Check if the request is a POST request
        if ($request->isMethod('POST')) {
            // Retrieve form data from the request
            $nom = $request->request->get('nom');
            $prenom = $request->request->get('prenom');
            $email = $request->request->get('email');
            $motDePasse = $request->request->get('mot_de_passe');

            // Accessing the EntityManager through the ManagerRegistry
            $entityManager = $this->doctrine->getManager();

            // Create a new UsersAccount entity
            $user = new UsersAccount();
            $user
                ->setNom($nom)
                ->setPrenom($prenom)
                ->setEmail($email)
                ->setMotDePasse($this->passwordHasher->hashPassword($user, $motDePasse))
                ->setTypeUtilisateur('Employe');

            // Persist the entity to the database
            $entityManager->persist($user);
            $entityManager->flush();

            // You can return a JSON response or any other response as needed
            return $this->json(['message' => 'User added successfully']);
        }

        return $this->render('add_users/add_users.html.twig', [
            'controller_name' => 'AddUsersController',
        ]);
    }
}