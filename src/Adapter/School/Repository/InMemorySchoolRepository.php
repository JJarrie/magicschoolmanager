<?php

namespace App\Adapter\School\Repository;

use App\Domain\MagicSchool\School\Repository\SchoolRepositoryInterface;
use App\Domain\MagicSchool\School\School;

class InMemorySchoolRepository implements SchoolRepositoryInterface
{
    private array $innerRepository;

    public function __construct()
    {
        $this->innerRepository = [];
    }

    public function save(School $school): void
    {
        $this->innerRepository[$school->getId()->toString()] = $school;
    }
}
