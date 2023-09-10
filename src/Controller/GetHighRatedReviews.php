<?php

namespace App\Controller;

use App\Entity\Review;
use App\Entity\Car;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpFoundation\JsonResponse;

#[AsController]
class GetHighRatedReviews extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function __invoke(int $id9): JsonResponse
    {
        $repository = $this->entityManager->getRepository(Review::class);
/*
        $query = $repository->createQueryBuilder('r')
            ->innerJoin(Car::class, 'c', 'WITH', 'r.car = c.id')
            ->where('c.id = :carId')
            ->andWhere('r.starRating > 6')
            ->setParameter('carId', $id)
            ->setMaxResults(5)
            ->orderBy('r.id', 'DESC')
            ->getQuery();
        */
        $highRatedReviews = $repository->findBy(['car' => $id9, 'starRating' => 6]);

        //$highRatedReviews = $query->getResult();

        $data = [];
        foreach ($highRatedReviews as $review) {
            $data[] = [
                'id' => $review->getId(),
                'reviewText' => $review->getReviewText(),
                'starRating' => $review->getStarRating(),
            ];
        }

        return new JsonResponse($data);
    }
}
