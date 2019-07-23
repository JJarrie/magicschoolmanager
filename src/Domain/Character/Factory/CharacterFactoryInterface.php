<?php

namespace App\Domain\Character\Factory;

use App\Domain\Character\Character;

interface CharacterFactoryInterface
{
    public function create(string $name): Character;
}
