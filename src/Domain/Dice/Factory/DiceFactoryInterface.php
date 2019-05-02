<?php

namespace App\Domain\Dice\Factory;

use App\Domain\Dice\Dice;

interface DiceFactoryInterface
{
    public function create(int $faces): Dice;
}
