<?php
namespace App\Entity;


use ApiPlatform\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use App\Repository\ReviewRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ApiResource(
    routePrefix: '/v1',
    operations:[
        new Get(),
        new Post(),
    ]
)]
#[ApiFilter(RangeFilter::class, properties: ['starRating' =>'gte'])]
#[ApiFilter(SearchFilter::class, properties: ['car'])]
class Review
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private ?int $id = null;


    #[ORM\Column(type: 'text')]
    private string $reviewText = '';

    #[ORM\Column]
    #[Assert\Range(min: 1, max:10)]
    private int $starRating = 1;


    #[ORM\ManyToOne(targetEntity: Car::class, inversedBy: 'reviews'),
     ORM\JoinColumn(nullable: false)]
    public $car;


    private $repository;

    public function __construct(ReviewRepository  $repository)
    {
        $this->repository = $repository;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReviewText(): ?string
    {
        return $this->reviewText;
    }

    public function setReviewText(string $reviewText): self
    {
        $this->reviewText = $reviewText;

        return $this;
    }

    public function getStarRating(): ?int
    {
        return $this->starRating;
    }

    public function setStarRating(int $starRating): self
    {
        $this->starRating = $starRating;

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(?Car $car): self
    {
        $this->car = $car;

        return $this;
    }
    public function findHighestRatedForCar(Car $car): ?Review
    {
        return $this->repository->findHighestRatedForCar($car);
    }

}

