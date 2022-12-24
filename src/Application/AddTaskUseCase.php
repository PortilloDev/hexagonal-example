<?php

namespace App\Application;

use App\Domain\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;

class AddTaskUseCase
{
    public function execute(EntityManagerInterface $entityManager)
    {
        $newTask = new Task();
        $newTask->setTitle('A new random task '.rand());

        $entityManager->persist($newTask);
        $entityManager->flush();

        // Otras posibles acciones relacionadas con añadir tareas..

        return 'Adding a random task..';
    }
}