<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 19/06/19
 * Time: 16:41
 */

namespace App\DataFixtures;

use Faker;
use App\Entity\News;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class NewsFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i=0; $i<=10; $i++) {
            $news = new News();
            $news->setName($faker->sentence);
            $news->setContent($faker->text(255));
            $news->setDate($faker->datetime());
            $manager->persist($news);
        }
        $manager->flush();
    }
}
