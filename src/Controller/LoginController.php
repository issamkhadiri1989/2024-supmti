<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(
        AuthenticationUtils $utils,
    ): Response {

        $user = $this->getUser();

        if ($user) {
            // redirect to home
        }

        $username = $utils->getLastUsername();
        $error = $utils->getLastAuthenticationError();

        return $this->render('login/index.html.twig', [
            'error' => $error,
            'last_username' => $username,
        ]);
    }
}
