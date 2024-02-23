<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Xylis\FakerCinema\Provider\Person;

class ActorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        $faker->addProvider(new Person($faker));

        for ($i = 0; $i < 31; $i++) {
            $actor = new Actor();
            $name = $faker->actor;

            list($firstName, $lastName) = explode(' ', $name, 2);

            $actor->setFirstname($firstName);
            $actor->setLastname($lastName);
            $actor->setNationality($faker->country);
            $manager->persist($actor);

            $this->addReference('actor-' . $i, $actor);
        }

        $manager->flush();
    }
}