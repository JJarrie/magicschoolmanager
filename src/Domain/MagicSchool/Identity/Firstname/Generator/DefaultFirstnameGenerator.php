<?php

namespace App\Domain\MagicSchool\Identity\Firstname\Generator;

use App\Domain\Generator\ArrayGenerator;
use App\Domain\MagicSchool\GenderConstant;
use App\Domain\MagicSchool\Identity\Firstname\Provider\FemaleFirstnameProviderInterface;
use App\Domain\MagicSchool\Identity\Firstname\Provider\MaleFirstnameProviderInterface;
use Symfony\Component\Routing\Exception\InvalidParameterException;

class DefaultFirstnameGenerator implements FirstnameGeneratorInterface
{
    private $arrayGenerator;
    private $femaleFirstnameProvider;
    private $maleFirstnameProvider;

    public function __construct(ArrayGenerator $arrayGenerator, FemaleFirstnameProviderInterface $femaleFirstnameProvider, MaleFirstnameProviderInterface $maleFirstnameProvider)
    {
        $this->arrayGenerator = $arrayGenerator;
        $this->femaleFirstnameProvider = $femaleFirstnameProvider;
        $this->maleFirstnameProvider = $maleFirstnameProvider;
    }

    public function generate(string $gender): string
    {
        switch ($gender) {
            case GenderConstant::MALE:
                return $this->arrayGenerator->generate($this->maleFirstnameProvider->all());
            case GenderConstant::FEMALE:
                return $this->arrayGenerator->generate($this->femaleFirstnameProvider->all());
            default:
                throw new InvalidParameterException(sprintf('The gender %s is not supported.', $gender));
        }
    }
}
