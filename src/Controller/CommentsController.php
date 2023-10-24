<?php

namespace App\Controller;

use App\Entity\Comments;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentsController extends AbstractController
{
    // ...

    #[Route("/add-comment", name: "add_comment", methods: ["POST"])]
    public function addComment(Request $request): Response
    {
        // Récupérez les données du formulaire
        $name = $request->request->get('name');
        $rating = $request->request->get('rating');
        $commentText = $request->request->get('comment');

        // Créez une nouvelle instance de l'entité Comments
        $comment = new Comments();

        // Assignez les données du formulaire à l'entité
        $comment->setName($name);
        $comment->setRating($rating);
        $comment->setComment($commentText);
        $comment->setModeration(0); // En attente de validation

        // Enregistrez le commentaire dans la base de données
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($comment);
        $entityManager->flush();

        // Redirigez l'utilisateur vers la page où les commentaires sont affichés
        return $this->redirectToRoute('list_comments');
    }
}
