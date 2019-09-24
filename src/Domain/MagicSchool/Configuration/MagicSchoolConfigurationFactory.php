<?php

namespace App\Domain\MagicSchool\Configuration;

use App\Domain\MagicSchool\MagicSchoolConfiguration;

/**
 * @author Jérémy JARRIÉ <jeremy.jarrie@sensiolabs.com>
 */
class MagicSchoolConfigurationFactory
{
    const DEFAULT_FIRST_YEAR_AGE = 11;
    const DEFAULT_NB_STUDYING_YEAR = 7;
    const DEFAULT_BACK_TO_SCHOOL_DAY = 1;
    const DEFAULT_BACK_TO_SCHOOL_MONTH = 9;

    public function createDefault(): MagicSchoolConfiguration
    {

        $now = new \DateTimeImmutable();

        return new MagicSchoolConfiguration(
            intval($now->format('Y')),
            self::DEFAULT_FIRST_YEAR_AGE,
            self::DEFAULT_NB_STUDYING_YEAR,
            self::DEFAULT_BACK_TO_SCHOOL_DAY,
            self::DEFAULT_BACK_TO_SCHOOL_MONTH
        );
    }
}
