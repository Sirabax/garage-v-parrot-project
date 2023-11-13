<?php

namespace App\Controller;

use App\Entity\Comments;
use App\Form\CommentFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentFormController extends AbstractController
{
    #[Route('/comment/add', name: 'add_comment')]
    public function addComment(Request $request, EntityManagerInterface $entityManager): Response
    {
        $comment = new Comments();
        $form = $this->createForm(CommentFormType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Persist the comment data to the database
            $entityManager->persist($comment);
            $entityManager->flush();

            // You may add a success flash message or redirect to a success page
            $this->addFlash('success', 'Comment added successfully.');
            // Redirect to a success page or route
            return $this->redirectToRoute('success_route');
        }

        return $this->render('comment/add.html.twig', [
            'commentForm' => $form->createView(),
        ]);
    }
}
