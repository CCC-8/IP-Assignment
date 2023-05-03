<?php

namespace App\Decorators;

// Define a concrete decorator class for breakfast meal plan
class BreakfastDecorator extends ReservationDecorator
{
    public function calculateMealCost()
    {
        return parent::calculateMealCost() + 20; // Add RM20 for breakfast
    }
}
