<?php

namespace App\Domain\Player\Factory;

use App\Domain\Player\Player;

interface PlayerFactoryInterface
{
    public function create(string $name): Player;
}
