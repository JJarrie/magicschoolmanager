<?php

namespace App\Domain\School;

class SchoolFactory
{
    public function fromArray(array $array): School
    {
        return new School($array['name']);
    }
}
