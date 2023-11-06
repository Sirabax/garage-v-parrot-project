<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CommentsRepository; // Import the CommentsRepository

class HomeController extends AbstractController
{
    private $entityManager;
    private $commentsRepository;

    public function __construct(EntityManagerInterface $entityManager, CommentsRepository $commentsRepository)
    {
        $this->entityManager = $entityManager;
        $this->commentsRepository = $commentsRepository;
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        // Fetch comments from the database
        $comments = $this->commentsRepository->findAll();

        return $this->render('comments.html.twig', [
            'comments' => $comments,
        ]);
    }
}
