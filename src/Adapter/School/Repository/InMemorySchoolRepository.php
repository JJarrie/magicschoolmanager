<?php

namespace App\Adapter\School\Repository;

use App\Domain\School\Repository\SchoolRepositoryInterface;
use App\Domain\School\School;

class InMemorySchoolRepository implements SchoolRepositoryInterface
{
    private array $innerRepository;

    public function __construct()
    {
        $this->innerRepository = [];
    }

    public function save(School $school): void
    {
        $this->innerRepository[$school->getName()] = $school;
    }
}
