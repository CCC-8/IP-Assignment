<?php

namespace App\Decorators;

// Define a concrete decorator class for dinner meal plan
class DinnerDecorator extends ReservationDecorator
{
    public function calculateMealCost()
    {
        return parent::calculateMealCost() + 30; // Add RM30 for dinner
    }
}
