<?php

namespace App\Controller;

use App\Entity\Comments;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentsController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route("/comments", name: "comments")]
    public function index(): Response
    {
        $commentsRepository = $this->entityManager->getRepository(Comments::class);
        $comments = $commentsRepository->findAll();

        return $this->render('comments/comments.html.twig', [
            'comments' => $comments,
        ]);
    }
}
