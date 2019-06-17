<?php

namespace App\Domain\MagicSchool\Identity\Gender\Generator;

use App\Domain\Generator\ArrayGenerator;
use App\Domain\MagicSchool\Identity\Gender\Provider\GenderProviderInterface;

class DefaultGenderGenerator implements GenderGeneratorInterface
{
    private $arrayGenerator;
    private $genderProvider;

    public function __construct(ArrayGenerator $arrayGenerator, GenderProviderInterface $genderProvider)
    {
        $this->arrayGenerator = $arrayGenerator;
        $this->genderProvider = $genderProvider;
    }

    public function generate(): string
    {
        return $this->arrayGenerator->generate($this->genderProvider->all());
    }
}
