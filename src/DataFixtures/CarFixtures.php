<?php

namespace App\DataFixtures;

use App\Entity\Car;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $car = new Car();

        $car->setName("Car 1")
            ->setPrice(20.99)
            ->setCurrency("HRK");

        $manager->persist($car);

        $car = new Car();

        $car->setName("Car 2")
            ->setPrice(21.99)
            ->setCurrency("HRK");

        $manager->persist($car);

        $car = new Car();

        $car->setName("Car 3")
            ->setPrice(23.99)
            ->setCurrency("HRK");

        $manager->persist($car);

        $car = new Car();

        $car->setName("Car 4")
            ->setPrice(29.99)
            ->setCurrency("HRK");

        $manager->persist($car);

        $car = new Car();

        $car->setName("Car 5")
            ->setPrice(28.99)
            ->setCurrency("HRK");

        $manager->persist($car);
        $manager->flush();
    }
}
