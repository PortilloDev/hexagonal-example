<?php

namespace App\Application;

use App\Domain\Entity\Task;
use App\Infrastructure\Repository\TaskRepository;

class GetTasksUseCase
{
    public function execute(TaskRepository $taskRepository)
    {
        $titles = [];
        $tasks = $taskRepository->findAll();
        foreach ($tasks  as $task) {
            $titles[] = $task->getTitle();
        }

        // Otras posibles acciones relacionadas con obtener las tareas..

        return $titles;
    }
}