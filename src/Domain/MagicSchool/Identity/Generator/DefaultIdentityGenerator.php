<?php

namespace App\Domain\MagicSchool\Identity\Generator;

use App\Domain\Generator\DateGeneratorInterface;
use App\Domain\MagicSchool\Date\DateRuleRangeResolver;
use App\Domain\MagicSchool\Identity\Ancestry\Generator\AncestryGeneratorInterface;
use App\Domain\MagicSchool\Identity\Firstname\Generator\FirstnameGeneratorInterface;
use App\Domain\MagicSchool\Identity\Gender\Generator\GenderGeneratorInterface;
use App\Domain\MagicSchool\Identity\Identity;
use App\Domain\MagicSchool\Identity\Lastname\Generator\LastnameGeneratorInterface;
use App\Domain\MagicSchool\Identity\RaisingWorld\Resolver\RaisingWorldResolverInterface;
use App\Domain\MagicSchool\MagicSchoolConfiguration;
use App\Domain\MagicSchool\MagicSchoolState;

class DefaultIdentityGenerator implements IdentityGeneratorInterface
{
    private $genderGenerator;
    private $firstnameGenerator;
    private $lastnameGenerator;
    private $ancestryGenerator;
    private $raisingWorldResolver;
    private $dateGenerator;
    private $dateRuleRangeResolver;

    public function __construct(GenderGeneratorInterface $genderGenerator, FirstnameGeneratorInterface $firstnameGenerator, LastnameGeneratorInterface $lastnameGenerator, AncestryGeneratorInterface $ancestryGenerator, RaisingWorldResolverInterface $raisingWorldResolver, DateGeneratorInterface $dateGenerator, DateRuleRangeResolver $dateRuleRangeResolver)
    {
        $this->genderGenerator = $genderGenerator;
        $this->firstnameGenerator = $firstnameGenerator;
        $this->lastnameGenerator = $lastnameGenerator;
        $this->ancestryGenerator = $ancestryGenerator;
        $this->raisingWorldResolver = $raisingWorldResolver;
        $this->dateGenerator = $dateGenerator;
        $this->dateRuleRangeResolver = $dateRuleRangeResolver;
    }

    public function generate(MagicSchoolConfiguration $schoolConfiguration, MagicSchoolState $schoolState, int $year = self::UNDEFINED_YEAR): Identity
    {
        $gender = $this->genderGenerator->generate();
        $ancestry = $this->ancestryGenerator->generate();
        $firstname = $this->firstnameGenerator->generate($gender);
        $lastname = $this->lastnameGenerator->generate($ancestry);
        $birthdayRange = (self::UNDEFINED_YEAR === $year)
            ? $this->dateRuleRangeResolver->birthdayRangeForStudents($schoolConfiguration, $schoolState)
            : $this->dateRuleRangeResolver->birthdayRangeForStudent($year, $schoolConfiguration, $schoolState);

        return new Identity(
            $gender,
            $firstname,
            $lastname,
            $this->dateGenerator->generateBetween($birthdayRange->getFrom(), $birthdayRange->getTo()),
            $ancestry,
            $this->raisingWorldResolver->resolve($ancestry)
        );
    }
}
