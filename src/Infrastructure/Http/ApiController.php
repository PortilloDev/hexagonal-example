<?php

namespace App\Infrastructure\Http;

use App\Application\GetTasksUseCase;
use App\Infrastructure\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    /**
     * @Route("/api", name="app_api")
     */
    public function index(GetTasksUseCase $getTasksUseCase, TaskRepository $taskRepository): JsonResponse
    {
        return $this->json([
            'allThetasks' => $getTasksUseCase->execute($taskRepository),
        ]);
    }
}