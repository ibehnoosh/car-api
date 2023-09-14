<?php
namespace App\Controller;

use App\Entity\Car;
use App\Entity\Review;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;


class GetHighRatedReviews extends AbstractController
{
    public function __invoke(Car $car): JsonResponse
    {
        $reviews = $car->getReviews()->filter(function (Review $review) {
            return $review->getStarRating() >= 6;
        });
        return $this->json($reviews);
    }
}