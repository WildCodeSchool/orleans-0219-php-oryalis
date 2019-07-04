<?php

namespace App\DataFixtures;

use App\Entity\Standard;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class StandardFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('en_US');
        for ($i=0; $i< 5; $i++) {
            $standard = new Standard();
            $standard->setTitle($faker->catchPhrase);
            $standard->setDescription($faker->realText($maxNbChars = 1250, $indexSize = 2));
            $manager->persist($standard);
        }
        $manager->flush();
    }
}
