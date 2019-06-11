<?php

namespace App\DataFixtures;

use App\Entity\Formation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class FormationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i= 1; $i <= 10; $i++) {
            $formation = new Formation();
            $formation->setTitre($faker->sentence);
            $formation->setDuree($faker->monthName);
            $formation->setPublic($faker->sentence);
            $formation->setPedagogie($faker->sentence);
            $formation->setFormateur($faker->word);
            $formation->setProgramme($faker->name);

            $manager->persist($formation);
        }
        $manager->flush();
    }
}
