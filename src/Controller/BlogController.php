<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Form\Type\BlogType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class BlogController extends AbstractController
{
    #[Route('/blog/edit/{id}', name: 'app_edit_blog')]
    #[IsGranted('ROLE_ADMIN')]
    public function index(Blog $blog): Response
    {
        $form = $this->createForm(BlogType::class, $blog);

        return $this->render('blog/edit.html.twig', [
            'blogEditForm' => $form,
        ]);
    }
}
