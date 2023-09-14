<?php


namespace App\Tests\Entity;

use App\Entity\Car;
use App\Entity\Review;
use PHPUnit\Framework\TestCase;

class CarTest extends TestCase
{
    public function testCarProperties()
    {
        $car = new Car();
        $car->setBrand('Ford')
            ->setModel('Fiesta')
            ->setColor('Red');

        $this->assertEquals('Ford', $car->getBrand());
        $this->assertEquals('Fiesta', $car->getModel());
        $this->assertEquals('Red', $car->getColor());
    }

    public function testAddAndRemoveReview()
    {
        $car = new Car();
        $review = new Review();

        $car->addReview($review);

        $this->assertCount(1, $car->getReviews());

        $car->removeReview($review);

        $this->assertCount(0, $car->getReviews());
    }
}

