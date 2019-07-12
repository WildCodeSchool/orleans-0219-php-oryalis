<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 18/06/19
 * Time: 16:48
 */

namespace App\DataFixtures;

use App\Entity\Question;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class QuestionFixtures extends Fixture
{



    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        foreach (Question::MONTHS as $nbMonth => $month) {
            $question = new Question();
            $question->setName($faker->sentence(15));
            $question->setExplanation($faker->text(500));
            $question->setMonth($nbMonth);
            $question->setYear($faker->year());
            $this->addReference('question' . $nbMonth, $question);
            $manager->persist($question);
        }
        $manager->flush();
    }
}
