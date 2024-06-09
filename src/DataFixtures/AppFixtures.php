<?php

namespace App\DataFixtures;

use App\Factory\BlogFactory;
use App\Factory\CategoryFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private const COUNT_CATEGORIES = 5;

    private const COUNT_BLOGS = 30;

    public function load(ObjectManager $manager): void
    {
        CategoryFactory::createMany(self::COUNT_CATEGORIES);

        BlogFactory::createMany(self::COUNT_BLOGS);

        $manager->flush();
    }
}
