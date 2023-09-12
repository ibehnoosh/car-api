<?php
namespace App\Controller;

use App\Entity\Review;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;


class GetHighRatedReviews extends AbstractController
{
    public function __invoke(EntityManagerInterface $em): JsonResponse
    {
        $reviews = $em->getRepository(Review::class)
            ->findBy(
                ['starRating' => ['>=' => 6]],
                ['id' => 'DESC'],
                5
            );

        return $this->json($reviews);
    }
}