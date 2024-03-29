<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Component\Routing\Attribute\Route;

#[Route("/browse", name: "app_browse_")]
class CategoryController extends AbstractController
{
    #[Route('/{categorySlug}', name: 'category')]
    public function index(
        #[MapEntity(mapping:['categorySlug' => 'slug'])]
        Category $category
    ): Response
    {   dump($category);
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }

    #[Route("/all", name: "all", priority: 2)]
    public function browseCategories(): Response
    {
        return new Response();
    }

    public function categoriesMenu(): Response
    {
        return $this->render('category/menu.html.twig');
    }
}
