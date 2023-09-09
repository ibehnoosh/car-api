<?php
namespace App\Entity;


use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ApiResource]
class Car
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    private string $brand = '';

    #[ORM\Column]
    #[Assert\NotBlank]
    private string $model = '';

    #[ORM\Column]
    #[Assert\NotBlank]
    private string $color = '';

    /**
     * @var Review[]|ArrayCollection
     *
     */
    #[ORM\OneToMany(targetEntity: Review::class, mappedBy: 'car', cascade: ['persist'])]
    public iterable $reviews;

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function addOffer(Review $review): void
    {
        $review->car = $this;
        $this->reviews->add($review);
    }

    public function removeOffer(Review $review): void
    {
        $review->car = null;
        $this->reviews->removeElement($review);
    }
}

