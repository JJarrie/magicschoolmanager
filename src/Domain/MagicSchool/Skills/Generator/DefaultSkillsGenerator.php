<?php

namespace App\Domain\MagicSchool\Skills\Generator;

use App\Domain\CharacteristicsConstant;
use App\Domain\Generator\ArrayGenerator;
use App\Domain\MagicSchool\Characteristics\Characteristics;
use App\Domain\MagicSchool\Skills\Mapping\SkillCharacteristicsMapping;
use App\Domain\MagicSchool\Skills\Skills;
use App\Domain\SkillConstant;

class DefaultSkillsGenerator implements SkillGeneratorInterface
{
    private $skillCharacteristicMapping;
    private $arrayGenerator;

    public function __construct(SkillCharacteristicsMapping $skillCharacteristicMapping, ArrayGenerator $arrayGenerator)
    {
        $this->skillCharacteristicMapping = $skillCharacteristicMapping;
        $this->arrayGenerator = $arrayGenerator;
    }

    public function generate(Characteristics $characteristics): Skills
    {
        $skills = new Skills(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $skills = $this->updateSkillsForCombination($skills, CharacteristicsConstant::BODY, CharacteristicsConstant::HEART, $characteristics->getBody() + $characteristics->getHeart());
        $skills = $this->updateSkillsForCombination($skills, CharacteristicsConstant::BODY, CharacteristicsConstant::SPIRIT, $characteristics->getBody() + $characteristics->getSpirit());

        return $this->updateSkillsForCombination($skills, CharacteristicsConstant::SPIRIT, CharacteristicsConstant::HEART, $characteristics->getSpirit() + $characteristics->getHeart());
    }

    private function updateSkillsForCombination(Skills $skills, string $characteristic1, string $characteristic2, int $amount): Skills
    {
        $associatedSkills = $this->skillCharacteristicMapping->get($characteristic1, $characteristic2);

        for (; $amount > 0; --$amount) {
            $randomSkill = $this->arrayGenerator->generate($associatedSkills);
            $skills = $this->incrementSkill($skills, $randomSkill);
        }

        return $skills;
    }

    private function incrementSkill(Skills $skills, string $skill): Skills
    {
        switch ($skill) {
            case SkillConstant::BLUFF:
                $skills->incrementBluff();
                break;
            case SkillConstant::JOKE:
                $skills->incrementJoke();
                break;
            case SkillConstant::TACTICAL:
                $skills->incrementTactical();
                break;
            case SkillConstant::RUMOR:
                $skills->incrementRumor();
                break;
            case SkillConstant::DECORUM:
                $skills->incrementDecorum();
                break;
            case SkillConstant::DISCRETION:
                $skills->incrementDiscretion();
                break;
            case SkillConstant::PERSUASION:
                $skills->incrementPersuasion();
                break;
            case SkillConstant::ROMANCE:
                $skills->incrementRomance();
                break;
            case SkillConstant::FIGHT:
                $skills->incrementBluff();
                break;
            case SkillConstant::STAMINA:
                $skills->incrementStamina();
                break;
            case SkillConstant::PERCEPTION:
                $skills->incrementPerception();
                break;
            case SkillConstant::ACCURACY:
                $skills->incrementAccuracy();
                break;
        }

        return $skills;
    }
}
