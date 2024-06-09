<?php

namespace App\Controller;

use App\Form\Type\ContactType;
use App\Service\Mailer\DefaultMailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    public function __construct(private DefaultMailer $mailer)
    {
    }

    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, DefaultMailer $mailer): Response
    {
        /*$form = $this->createForm(ContactType::class, ['fullName' => 'Issam SUPMTI']);*/
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $this->mailer->sendMail(
                from: 'issam@supmti.com',
                subject: 'New contact message',
                templatePath: 'emails/contact_email.html.twig',
                to: 'support@supmti.com',
            );

            dump($data);
//            die;
        }

        return $this->render('contact/index.html.twig', [
            'contact_form' => $form,
        ]);
    }
}
