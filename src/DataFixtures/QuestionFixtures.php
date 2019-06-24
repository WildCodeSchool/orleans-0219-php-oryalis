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

    const MONTHS = [
        'Janvier',
        'Février',
        'Mars',
        'Avril',
        'Mai',
        'Juin',
        'Juillet',
        'Août',
        'Septembre',
        'Octobre',
        'Novembre',
        'Décembre'
        ];

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        foreach (self::MONTHS as $key => $monthQuestion) {
            $question = new Question();
            $question->setName($faker->sentence(15));
            $question->setExplanation($faker->text(500));
            $question->setMonth($faker->monthName);
            $question->setYear($faker->year);
            $this->addReference('question' . $key, $question);
            $manager->persist($question);
        }
        $manager->flush();
    }
}
