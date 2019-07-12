<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 18/06/19
 * Time: 16:48
 */

namespace App\DataFixtures;

use App\Entity\Answer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class AnswerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i=0; $i<=24; $i++) {
            $answer = new Answer();
            $answer->setName($faker->sentence(2));
            $answer->setGoodAnswer($faker->numberBetween($min = 0, $max = 1));
            $answer->setQuestion($this->getReference('question'. $faker->numberBetween($min = 1, $max = 12)));
            $manager->persist($answer);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [QuestionFixtures::class];
    }
}
