<?php

namespace App\Domain\Character\Factory;

use App\Domain\Character\Character;

class CharacterFactory implements CharacterFactoryInterface
{
    public function create(string $name): Character
    {
        return new Character($name);
    }
}
