<?php

namespace App\Decorators;

// Define a concrete decorator class for lunch meal plan
class LunchDecorator extends ReservationDecorator
{
    public function calculateMealCost()
    {
        return parent::calculateMealCost() + 25; // Add RM25 for lunch
    }
}
