<?php

namespace App\Domain\MagicSchool\Skills\Mapping;

use App\Domain\CharacteristicsConstant;
use App\Domain\SkillConstant;

class SkillCharacteristicsMapping
{
    public const MAP = [
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

    public function get(string $characteristic1, string $characteristic2): array
    {
        return array_keys(array_filter(self::MAP, function (array $element) use ($characteristic1, $characteristic2) {
            return ($element[0] === $characteristic1 || $element[0] === $characteristic2) && ($element[1] === $characteristic1 || $element[1] === $characteristic2);
        }));
    }


}
