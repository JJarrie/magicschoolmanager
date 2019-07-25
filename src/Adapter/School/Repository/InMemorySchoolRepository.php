<?php

namespace App\Adapter\School\Repository;

use App\Domain\School\School;

class InMemorySchoolRepository
{
    /**
     * @var School[]
     */
    private $innerRepository;

    public function __construct()
    {
        $this->innerRepository = [];
    }

    public function save(School $school): void
    {
        $this->innerRepository[$school->getName()] = $school;
    }
}
