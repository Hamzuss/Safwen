<?php

namespace App\Controller;

use App\Entity\Expert;
use App\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {

        $expert=new Expert();
        $form = $this->createFormBuilder($expert)
            ->add('Email',texttype::class)
            ->add('Mot de passe',texttype::class);

        $form = $this->createForm(LoginType::class, $form);
        return $this->renderForm(':home:index.html.twig', [
            'form' => $form,]);
    }


}
