<?php

namespace App\Tests\Entity;

use App\Entity\Review;
use PHPUnit\Framework\TestCase;

class ReviewTest extends TestCase
{
    public function testReviewProperties()
    {
        $review = new Review();
        $review->setReviewText('Excellent Car!')
            ->setStarRating(9);

        $this->assertEquals('Excellent Car!', $review->getReviewText());
        $this->assertEquals(9, $review->getStarRating());
    }
}
