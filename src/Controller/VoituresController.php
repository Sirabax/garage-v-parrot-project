<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Voitures;

class VoituresController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route("/voitures", name: "voitures")]
    public function index(): Response
    {
        $voitureRepository = $this->entityManager->getRepository(Voitures::class);
        $voitures = $voitureRepository->findAll();

        return $this->render('voitures/voitures.html.twig', [
            'voitures' => $voitures,
        ]);
    }
}