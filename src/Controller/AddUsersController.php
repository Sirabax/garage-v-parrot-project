<?php

namespace App\Controller;

use App\Entity\UsersAccount;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AddUsersController extends AbstractController
{
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

            // Create a new UsersAccount entity
            $user = new UsersAccount();
            $user
                ->setNom($nom)
                ->setPrenom($prenom)
                ->setEmail($email)
                ->setMotDePasse($passwordEncoder->encodePassword($user, $motDePasse))
                ->setTypeUtilisateur('Employe');

            // Persist the entity to the database
            $entityManager = $this->getDoctrine()->getManager();
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
