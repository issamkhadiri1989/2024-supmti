<?php

namespace App\Controller;

use App\Form\Type\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(): Response
    {
        /*$form = $this->createForm(ContactType::class, ['fullName' => 'Issam SUPMTI']);*/
        $form = $this->createForm(ContactType::class);

        return $this->render('contact/index.html.twig', [
           'contact_form' => $form,
        ]);
    }
}
