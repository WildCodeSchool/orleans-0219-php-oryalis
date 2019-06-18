<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 18/06/19
 * Time: 16:48
 */

namespace App\DataFixtures;

use App\Entity\QCMQuestions;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class QuestionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i=0; $i<=10; $i++) {
            $question = new QCMQuestions();
            $question->setName($faker->sentence(25));
            $question->setExplication($faker->text(500));
            $question->setMonth($faker->monthName);
            $question->setYear($faker->year);
            $this->addReference('question_' . $id, $question);
            $manager->persist($question);
        }
        $manager->flush();
    }
}