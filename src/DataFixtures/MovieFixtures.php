<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class MovieFixtures extends Fixture implements OrderedFixtureInterface
{
    // définir l'ordre de chargement des fixtures
    public function getOrder(): int
    {
        return 4;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 1; $i < 30; ++$i) {
            $movie = new Movie();
            $movie->setTitle($faker->sentence(3));
            $movie->setDescription($faker->paragraph);
            $movie->setReleaseDate($faker->dateTimeThisCentury);
            $movie->setDuration($faker->numberBetween(60, 200));
            $movie->setOnline($faker->boolean(80));
            $movie->setCategory($this->getReference('category_' . rand(1, 4)));

            $actors = [];
            foreach (range(1, rand(2, 6)) as $j) {
                $actor = $this->getReference('actor_' . rand(1, 9));
                if (!in_array($actor, $actors)) {
                    $actors[] = $actor;
                    $movie->addActor($actor);
                }
            }

            $manager->persist($movie);
        }

        $manager->flush();
    }
}
