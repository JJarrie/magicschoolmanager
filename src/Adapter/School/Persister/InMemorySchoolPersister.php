<?php

namespace App\Adapter\School\Persister;

use App\Domain\School\Persister\SchoolPersisterInterface;
use App\Domain\School\School;

class InMemorySchoolPersister implements SchoolPersisterInterface
{
    public function save(School $school): void
    {
        // TODO: Implement save() method.
    }
}
