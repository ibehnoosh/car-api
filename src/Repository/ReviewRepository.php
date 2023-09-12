<?php

namespace App\Repository;

use App\Entity\Car;
use App\Entity\Review;
use Doctrine\ORM\EntityRepository;

class ReviewRepository extends EntityRepository
{
    public function findHighestRatedForCar(Car $car): ?Review
    {
        return $this->findOneBy([
            'car' => $car,
            'starRating' => ['$gt' => 6],
        ], ['starRating' => 'DESC'], 1);
    }
}