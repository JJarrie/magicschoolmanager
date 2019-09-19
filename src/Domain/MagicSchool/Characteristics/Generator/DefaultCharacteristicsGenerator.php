<?php

namespace App\Domain\MagicSchool\Characteristics\Generator;

use App\Domain\CharacteristicsConstant;
use App\Domain\Generator\ArrayGenerator;
use App\Domain\MagicSchool\Characteristics\Characteristics;

class DefaultCharacteristicsGenerator implements CharacteristicsGeneratorInterface
{
    const DEFAULT_AWAKENING_POINTS = 5;

    private ArrayGenerator $arrayGenerator;

    public function __construct(ArrayGenerator $arrayGenerator)
    {
        $this->arrayGenerator = $arrayGenerator;
    }

    public function generate(int $currentYear): Characteristics
    {
        $awakeningPoints = self::DEFAULT_AWAKENING_POINTS + $currentYear - 1;
        $characteristics = new Characteristics(0, 0, 0, 1);

        for (; $awakeningPoints > 0; --$awakeningPoints) {
            $chosenCharacteristic = $this->arrayGenerator->generate([CharacteristicsConstant::BODY, CharacteristicsConstant::HEART, CharacteristicsConstant::SPIRIT]);
            switch ($chosenCharacteristic) {
                case CharacteristicsConstant::SPIRIT:
                    $characteristics->incrementSpirit();
                    break;
                case CharacteristicsConstant::HEART:
                    $characteristics->incrementHeart();
                    break;
                case CharacteristicsConstant::BODY:
                    $characteristics->incrementBody();
                    break;
            }
        }

        return $characteristics;
    }
}
