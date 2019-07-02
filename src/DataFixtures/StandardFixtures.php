<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 02/07/19
 * Time: 15:07
 */

namespace App\DataFixtures;

use App\Entity\Standard;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class StandardFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i=0; $i<=3; $i++) {
            $standard = new Standard();
            $standard->setTitle($faker->sentence(2));
            $standard->setDescription($faker->sentence(70));
            $manager->persist($standard);
        }
        $manager->flush();
    }
}
