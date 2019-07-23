<?php

namespace App\Domain\Player\Factory;

use App\Domain\Player\Player;

class PlayerFactory implements PlayerFactoryInterface
{
    public function create(string $name): Player
    {
        return new Player($name);
    }
}
