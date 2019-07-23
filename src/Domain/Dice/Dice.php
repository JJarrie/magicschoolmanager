<?php

namespace App\Domain\Dice;

use App\Domain\Generator\Int\IntGeneratorInterface;

class Dice
{
    private $intGenerator;
    private $faces;

    public function __construct(IntGeneratorInterface $intGenerator, int $faces)
    {
        $this->intGenerator = $intGenerator;
        $this->faces = $faces;
    }

    public function roll(): int
    {
        return $this->intGenerator->generateBetween(1, $this->faces);
    }
}
