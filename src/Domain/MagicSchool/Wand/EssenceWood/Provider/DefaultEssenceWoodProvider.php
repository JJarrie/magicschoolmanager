<?php

namespace App\Domain\MagicSchool\Wand\EssenceWood\Provider;

use App\Domain\MagicSchool\EssenceWoodConstant;

class DefaultEssenceWoodProvider implements EssenceWoodProviderInterface
{
    public function all(): array
    {
        return [
            EssenceWoodConstant::ACACIA,
            EssenceWoodConstant::MAHOGANY,
            EssenceWoodConstant::HAWTHORN,
            EssenceWoodConstant::ALDER,
            EssenceWoodConstant::CEDAR,
            EssenceWoodConstant::HORNBEAM,
            EssenceWoodConstant::CHESNUT,
            EssenceWoodConstant::WHITE_OAK,
            EssenceWoodConstant::RED_OAK,
            EssenceWoodConstant::DOGWOOD,
            EssenceWoodConstant::CYPRESS,
            EssenceWoodConstant::EBONY,
            EssenceWoodConstant::MAPLE,
            EssenceWoodConstant::ASH,
            EssenceWoodConstant::BEECH,
            EssenceWoodConstant::HOLLY,
            EssenceWoodConstant::YEW,
            EssenceWoodConstant::LAUREL,
            EssenceWoodConstant::LARCH,
            EssenceWoodConstant::HAZEL,
            EssenceWoodConstant::WALNUT,
            EssenceWoodConstant::BLACK_WALNUT,
            EssenceWoodConstant::ELM,
            EssenceWoodConstant::POPLAR,
            EssenceWoodConstant::PINE,
            EssenceWoodConstant::PEAR_TREE,
            EssenceWoodConstant::APPLE_TREE,
            EssenceWoodConstant::BLACKTHORN,
            EssenceWoodConstant::FIR,
            EssenceWoodConstant::WILLOW,
            EssenceWoodConstant::SEQUOIA,
            EssenceWoodConstant::MOUNTAIN_ASH,
            EssenceWoodConstant::SYCAMORE,
            EssenceWoodConstant::SILVER_LIME,
            EssenceWoodConstant::ASPEN,
            EssenceWoodConstant::VINE,
        ];
    }
}
