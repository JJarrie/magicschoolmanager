<?php

namespace App\Domain\Dice\Factory;

use App\Domain\Dice\Dice;
use App\Domain\Generator\Int\IntGeneratorInterface;

class DiceFactory implements DiceFactoryInterface
{
    private $intGenerator;

    public function __construct(IntGeneratorInterface $intGenerator)
    {
        $this->intGenerator = $intGenerator;
    }

    public function create(int $faces): Dice
    {
        return new Dice($this->intGenerator, $faces);
    }
}
