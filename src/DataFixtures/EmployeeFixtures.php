<?php

namespace App\DataFixtures;

use App\Entity\Employee;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class EmployeeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $placeholder =
        $faker  =  Faker\Factory::create('en_US');
        for ($i=0; $i< 6; $i++) {
            $employee = new Employee();
            $employee->setTitle($faker->catchPhrase);
            $employee->setDescription($faker->realText($maxNbChars = 1000, $indexSize = 2));
            $employee->setFirstname($faker->firstNameMale);
            $employee->setLastname($faker->lastName);
            $employee->setTel($faker->e164PhoneNumber);
            $employee->setPicture($faker->imageUrl($width = 150, $height = 150));
            $manager->persist($employee);
        }
        $manager->flush();
    }
}
