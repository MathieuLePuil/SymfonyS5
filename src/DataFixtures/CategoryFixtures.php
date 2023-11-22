<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CategoryFixtures extends Fixture implements OrderedFixtureInterface
{
    // définir l'ordre de chargement des fixtures
    public function getOrder(): int
    {
        return 3;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        // Vous pouvez modifier cette liste pour ajouter/supprimer des catégories
        $categories = ['Action', 'Adventure', 'Comedy', 'Drama', 'Horror'];

        for ($i = 0; $i < 5; ++$i) {
            $category = new Category();
            $category->setName((isset($categories[$i])) ? $categories[$i] : $faker->words(2, true));
            $manager->persist($category);
            $this->addReference('category_' . ($i + 1), $category);
        }

        $manager->flush();
    }
}
