<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class MovieFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $faker->addProvider(new \Xylis\FakerCinema\Provider\Movie($faker));
        $faker->addProvider(new \Xylis\FakerCinema\Provider\Person($faker));

        for ($i = 0; $i < 30; $i++) {
            $movie = (new Movie())
                ->setTitle($faker->unique()->movie)
                ->setDescription($faker->text(200))
                ->setDuration(rand(100, 250))
                ->setDirector($faker->director)
                ->setEntries(rand(5000, 10000000))
                ->setBudget(rand(100000, 100000000))
                ->setCategory($this->getReference('category-' . rand(1, 18)));
            for ($j = 1; $j <= rand(2, 28); $j++) {
                $movie->addActor($this->getReference('actor-' . rand(1, 30)));
            }
            $manager->persist($movie);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class,
            ActorFixtures::class,
        ];
    }
}