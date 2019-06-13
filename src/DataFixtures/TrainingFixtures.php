<?php

namespace App\DataFixtures;

use App\Entity\Training;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class TrainingFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i= 1; $i <= 10; $i++) {
            $formation = new Training();
            $formation->setTitle($faker->sentence);
            $formation->setPeriod($faker->monthName);
            $formation->setPublic($faker->sentence);
            $formation->setPedagogy($faker->sentence);
            $formation->setTrainer($faker->word);
            $formation->setProgram($faker->name);

            $manager->persist($formation);
        }
        $manager->flush();
    }
}
