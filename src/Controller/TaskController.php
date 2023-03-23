<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Task;
use App\Entity\User;

class TaskController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

    }

    public function index(): Response
    {
        //prueba de entidades y relaciones
        //tareas
        /* $task_repo = $this->entityManager->getRepository(Task::class);
        $tasks = $task_repo->findAll();

        foreach ($tasks as $task) {
            echo $task->getUserid()->getEmail().' '.$task->getTitle()."<br/>";
        } */

        //usuarios
        $user_repo = $this->entityManager->getRepository(User::class);
        $users = $user_repo->findAll();

        foreach ($users as $user) {
            echo "<h1>{$user->getName()} {$user->getSurname()}</h1>";
            foreach ($user->getTasks() as $task) {
                echo $task->getTitle()."<br/>";
            }
        }

        return $this->render('task/index.html.twig', [
            'controller_name' => 'TaskController',
        ]);
    }
}
