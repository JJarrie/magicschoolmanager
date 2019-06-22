<?php

namespace App\Domain\MagicSchool\School\Repository;

use App\Domain\MagicSchool\School\School;

interface SchoolRepositoryInterface
{
    public function save(School $school): void;
}
