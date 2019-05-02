<?php

namespace App\Domain\MagicSchool\State;

use App\Domain\MagicSchool\MagicSchoolState;

class MagicSchoolStateFactory
{
    public function createDefault(): MagicSchoolState
    {
        $now = new \DateTimeImmutable();

        return new MagicSchoolState(
            intval($now->format('Y')),
            intval($now->format('d')),
            intval($now->format('m'))
        );
    }
}
