<?php

namespace App\Domain\School\Repository;

use App\Domain\School\School;

interface SchoolRepositoryInterface
{
    public function save(School $school): void;
}
