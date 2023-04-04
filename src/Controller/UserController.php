<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\{Response, Request};
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Util\MyPasswordHasher;
use App\Form\RegisterType;
use DateTime;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class UserController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

    }

    public function register(Request $request,MyPasswordHasher $encoder)
    {
        //Crear Formulario
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);

        //Rellenar el objeto con los datos del formulario
        $form->handleRequest($request);

        //Comprobar si el formulario se ha enviado
        if ($form->isSubmitted() && $form->isValid()) {
            //modificando el objeto para guardarlo
           $user->setRole('ROLE_USER');
           $user->setCreatedAt(\DateTime::createFromFormat('d-m-Y H:i:s', date('d-m-Y H:i:s')));
           //cifrar contraseña
           $encoded = $encoder->hash($user->getPassword());
           $user->setPassword($encoded);
           
            //Guardar Usuario
           $this->entityManager->persist($user);
           $this->entityManager->flush();

           return $this->redirectToRoute('tasks');
        }

        return $this->render('user/register.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function login(AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('user/login.html.twig',array(
            'error' => $error,
            'last_username' => $lastUsername
        ));
    }
}
