<?php

namespace App\Domain\School\Persister;

use App\Domain\School\School;

interface SchoolPersisterInterface
{
    public function save(School $school): void;
}
