<?php

namespace App\Domain\MagicSchool\Skills\Mapping;

use App\Domain\CharacteristicsConstant;
use App\Domain\SkillConstant;

class SkillCharacteristicsMapping
{
    public function map(): array
    {
        return [
            SkillConstant::BLUFF => [CharacteristicsConstant::SPIRIT, CharacteristicsConstant::HEART],
            SkillConstant::JOKE => [CharacteristicsConstant::SPIRIT, CharacteristicsConstant::HEART],
            SkillConstant::TACTICAL => [CharacteristicsConstant::SPIRIT, CharacteristicsConstant::HEART],
            SkillConstant::RUMOR => [CharacteristicsConstant::SPIRIT, CharacteristicsConstant::HEART],
            SkillConstant::DECORUM => [CharacteristicsConstant::BODY, CharacteristicsConstant::HEART],
            SkillConstant::DISCRETION => [CharacteristicsConstant::BODY, CharacteristicsConstant::HEART],
            SkillConstant::PERSUASION => [CharacteristicsConstant::BODY, CharacteristicsConstant::HEART],
            SkillConstant::ROMANCE => [CharacteristicsConstant::BODY, CharacteristicsConstant::HEART],
            SkillConstant::FIGHT => [CharacteristicsConstant::SPIRIT, CharacteristicsConstant::BODY],
            SkillConstant::STAMINA => [CharacteristicsConstant::SPIRIT, CharacteristicsConstant::BODY],
            SkillConstant::PERCEPTION => [CharacteristicsConstant::SPIRIT, CharacteristicsConstant::BODY],
            SkillConstant::ACCURACY => [CharacteristicsConstant::SPIRIT, CharacteristicsConstant::BODY],
        ];
    }
}
