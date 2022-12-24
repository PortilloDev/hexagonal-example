<?php

namespace App\Infrastructure\Http;

use App\Application\AddTaskUseCase;
use App\Infrastructure\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/default', name: 'app_default')]
    public function index(AddTaskUseCase $addTaskUseCase, EntityManagerInterface $entityManager): JsonResponse
    {
        return $this->json([
            'message' => 'Hi! Welcome to your new controller! '.$addTaskUseCase->execute($entityManager),
            'path' => 'src/Infrastructure/Http/DefaultController.php',
        ]);
    }
}
