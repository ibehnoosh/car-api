<?php
namespace App\Entity;


use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
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
}

