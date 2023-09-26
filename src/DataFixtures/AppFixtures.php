<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use App\Entity\Category;
use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach (range(1, 5) as $i) {
            $category = new Category();
            $category->setName('Category '.$i);
            $manager->persist($category);
            $this->addReference('category_'.$i, $category);
        }

        // Create 10 actors

        foreach (range(1, 10) as $i) {
            $actor = new Actor();
            $actor->setFirstName('Actor '.$i);
            $actor->setLastName('Actor '.$i);
            $manager->persist($actor);
            $this->addReference('actor_'.$i, $actor);
        }

        // Create 30 movies

        foreach (range(1, 30) as $i) {
            $movie = new Movie();
            $movie->setTitle('Movie '.$i);
            $movie->setDescription('Movie '.$i);
            $movie->setReleaseDate(new \DateTime());
            $movie->setDuration('120');
            $movie->setCategory($this->getReference('category_'.rand(1, 5)));
            $movie->addActor($this->getReference('actor_'.rand(1, 10)));
            $movie->addActor($this->getReference('actor_'.rand(1, 10)));
            $manager->persist($movie);
        }

        $manager->flush();
    }
}
