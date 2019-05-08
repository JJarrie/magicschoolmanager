<?php

namespace App\Domain\DiceRollGenerator;

interface DiceRollGeneratorInterface
{
    public function roll(int $nbFaces, int $nbDices = 1): int;
}
