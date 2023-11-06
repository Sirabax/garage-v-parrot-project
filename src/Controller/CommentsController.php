<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Comments;

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

        return $this->render('comments.html.twig', [
            'comments' => $comments,
        ]);
        
    }
}