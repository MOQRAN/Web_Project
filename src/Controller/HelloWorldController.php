<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloWorldController extends AbstractController
{
    #[Route('/hello/world', name: 'hello_world')]
    public function index(): Response
    {
        $User = new User();
        $manager = $this->get("doctrine")->getManager();
        $manager->persist($User);
        // $manager->flush();

        $users = $manager->getRepository(User::class)->findAll();

        var_dump($users);

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/HelloWorldController.php',
        ]);
    }
}
