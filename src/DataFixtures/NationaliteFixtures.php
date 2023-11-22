<?php

namespace App\DataFixtures;

use App\Entity\Nationalite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class NationaliteFixtures extends Fixture implements OrderedFixtureInterface
{
    public function getOrder(): int
    {
        return 1;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        // Vous pouvez modifier cette liste pour ajouter/supprimer des nationalités
        $nationalities = ['French', 'American', 'British', 'German', 'Italian'];

        for ($i = 0; $i < 5; ++$i) {
            $nationalite = new Nationalite();
            $nationalite->setName((isset($nationalities[$i])) ? $nationalities[$i] : $faker->country);
            $manager->persist($nationalite);
            $this->addReference('nationalite_'.($i+1), $nationalite);
        }

        $manager->flush();
    }
}