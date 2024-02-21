<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Xylis\FakerCinema\Provider\Movie;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 30; $i++) {
            $faker = Factory::create();
            $faker->addProvider(new Movie($faker));
            $category = new Category();
            $category->setName($faker->movieGenre);
            $manager->persist($category);

            $this->addReference('category-' . $i, $category);
        }

        $manager->flush();
    }
}