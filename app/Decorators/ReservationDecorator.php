<?php

namespace App\Decorators;

use App\Models\Reservation;
use App\Decorators\ReservationDecoratorInterface;

// Define a base decorator class that implements the interface
abstract class ReservationDecorator implements ReservationDecoratorInterface
{
    protected $reservation;

    public function __construct(ReservationDecoratorInterface $reservation)
    {
        $this->reservation = $reservation;
    }

    public function calculateMealCost()
    {
        return $this->reservation->calculateMealCost();
    }
}
