<?php

namespace App\Domain\MagicSchool\Identity\Lastname\Generator;

use App\Domain\Generator\ArrayGenerator;
use App\Domain\MagicSchool\BloodStatusConstant;
use App\Domain\MagicSchool\Identity\Ancestry\Ancestry;
use App\Domain\MagicSchool\Identity\Lastname\Provider\LastNameProviderInterface;
use App\Domain\MagicSchool\Identity\Lastname\Provider\PureBloodLastnameProvider;

class DefaultLastnameGenerator implements LastnameGeneratorInterface
{
    private ArrayGenerator $arrayGenerator;
    private PureBloodLastnameProvider $pureBloodLastnameProvider;
    private LastNameProviderInterface $lastNameProvider;

    public function __construct(ArrayGenerator $arrayGenerator, PureBloodLastnameProvider $pureBloodLastnameProvider, LastNameProviderInterface $lastNameProvider)
    {
        $this->arrayGenerator = $arrayGenerator;
        $this->pureBloodLastnameProvider = $pureBloodLastnameProvider;
        $this->lastNameProvider = $lastNameProvider;
    }

    public function generate(Ancestry $ancestry): string
    {
        if (BloodStatusConstant::PURE_BLOOD === $ancestry->getAncestry()) {
            return $this->arrayGenerator->generate($this->pureBloodLastnameProvider->all());
        }

        return $this->arrayGenerator->generate($this->lastNameProvider->all());
    }
}
