<?php

namespace App\Tests\Domain\MagicSchool\Date;

use App\Domain\MagicSchool\Date\DateRuleResolver;
use App\Domain\MagicSchool\MagicSchoolConfiguration;
use App\Domain\MagicSchool\MagicSchoolState;
use PHPUnit\Framework\TestCase;

class DateResolverTest extends TestCase
{
    /** @var DateRuleResolver */
    private DateRuleResolver $dateRuleResolver;

    protected function setUp(): void
    {
        $this->dateRuleResolver = new DateRuleResolver();
    }

    public function testSchoolStartedin2019InFirstYearWhoBeginAt11Has2008AsGreatestYearBirthForStudent(): void
    {
        $schoolConfiguration = new MagicSchoolConfiguration(2019, 11, 0, 0, 0);
        $schoolState = new MagicSchoolState(1, 0, 0);
        $this->assertEquals(2008, $this->dateRuleResolver->greatestBirthYearForStudent($schoolConfiguration, $schoolState));
    }

    public function testSchoolStartedin2018InFirstYearWhoBeginAt11Has2007AsGreatestYearBirthForStudent(): void
    {
        $schoolConfiguration = new MagicSchoolConfiguration(2018, 11, 0, 0, 0);
        $schoolState = new MagicSchoolState(1, 0, 0);
        $this->assertEquals(2007, $this->dateRuleResolver->greatestBirthYearForStudent($schoolConfiguration, $schoolState));
    }

    public function testSchoolStartedin2018InFirstYearWhoBeginAt12Has2006AsGreatestYearBirthForStudent(): void
    {
        $schoolConfiguration = new MagicSchoolConfiguration(2018, 12, 0, 0, 0);
        $schoolState = new MagicSchoolState(1, 0, 0);
        $this->assertEquals(2006, $this->dateRuleResolver->greatestBirthYearForStudent($schoolConfiguration, $schoolState));
    }

    public function testSchoolStartedin2018InSecondYearWhoBeginAt12Has2007AsGreatestYearBirthForStudent(): void
    {
        $schoolConfiguration = new MagicSchoolConfiguration(2018, 12, 0, 0, 0);
        $schoolState = new MagicSchoolState(2, 0, 0);
        $this->assertEquals(2007, $this->dateRuleResolver->greatestBirthYearForStudent($schoolConfiguration, $schoolState));
    }

    public function testScholStartedIn2019InFirstYearWhoBeginAt11AndHave7YearToStudyHas2001AsLowestYearBirthForStudent(): void
    {
        $schoolConfiguration = new MagicSchoolConfiguration(2019, 11, 7, 0, 0);
        $schoolState = new MagicSchoolState(1, 0, 0);
        $this->assertEquals(2001, $this->dateRuleResolver->lowestYearBirthForStudent($schoolConfiguration, $schoolState));
    }

    public function testScholStartedIn2018InFirstYearWhoBeginAt11AndHave7YearToStudyHas2000AsLowestYearBirthForStudent(): void
    {
        $schoolConfiguration = new MagicSchoolConfiguration(2018, 11, 7, 0, 0);
        $schoolState = new MagicSchoolState(1, 0, 0);
        $this->assertEquals(2000, $this->dateRuleResolver->lowestYearBirthForStudent($schoolConfiguration, $schoolState));
    }

    public function testScholStartedIn2018InFirstYearWhoBeginAt11AndHave10YearToStudyHas1997AsLowestYearBirthForStudent(): void
    {
        $schoolConfiguration = new MagicSchoolConfiguration(2018, 11, 10, 0, 0);
        $schoolState = new MagicSchoolState(1, 0, 0);
        $this->assertEquals(1997, $this->dateRuleResolver->lowestYearBirthForStudent($schoolConfiguration, $schoolState));
    }
}
