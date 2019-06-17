<?php

namespace App\Domain\DiceRollGenerator;

use App\Domain\Generator\IntGeneratorInterface;

class DiceRollGenerator implements DiceRollGeneratorInterface
{
    private $intGenerator;

    public function __construct(IntGeneratorInterface $intGenerator)
    {
        $this->intGenerator = $intGenerator;
    }

    public function roll(int $nbFaces, int $nbDices = 1): int
    {
        $result = 0;

        for ($i = 0; $i < $nbDices; ++$i) {
            $result += $this->intGenerator->generateBetween(1, $nbFaces);
        }

        return $result;
    }
}
