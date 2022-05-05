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
    public function index(Request $request): Response
    {


        $expert=new Expert();
        $form = $this->createFormBuilder(LoginType::class, (array)$expert)
            ->add('email',texttype::class)
            ->add('password',texttype::class);

        $form = $this->createForm(LoginType::class, $form);
        return $this->renderForm(':home:index.html.twig', [
            'form' => $form,]);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LoginType::class,
        ]);
    }

}
