<?php

namespace App\Domain\Hogwart\Ancestry\Resolver;

use App\Domain\MagicSchool\Ancestry\AncestryInterface;
use App\Domain\MagicSchool\Ancestry\Resolver\AncestryResolverInterface;
use App\Domain\MagicSchool\BloodStatus;

class HogwartAncestryResolver implements AncestryResolverInterface
{
    public function resolve(AncestryInterface $motherAncestry, AncestryInterface $fatherAncestry): string
    {
        $motherAncestryValue = $motherAncestry->getAncestry();
        $fatherAncestryValue = $fatherAncestry->getAncestry();

        if ($motherAncestryValue === $fatherAncestryValue) {
            return $this->getIfTwiceParentHaveSameAncestry($motherAncestryValue);
        }

        if ($this->parentsAncestriesAreInWizardCombination($motherAncestryValue, $fatherAncestryValue)) {
            return BloodStatus::WIZARD;
        }

        return BloodStatus::HALF_BLOOD;
    }

    private function getIfTwiceParentHaveSameAncestry(string $ancestryValue): string
    {
        switch ($ancestryValue) {
            case BloodStatus::MUGGLE:
                return BloodStatus::MUGGLE_BORN;
            case BloodStatus::PURE_BLOOD:
                return BloodStatus::PURE_BLOOD;
            case BloodStatus::MUGGLE_BORN:
            case BloodStatus::HALF_BLOOD:
            case BloodStatus::WIZARD:
                return BloodStatus::WIZARD;
        }
    }

    private function parentsAncestriesAreInWizardCombination(string $motherAncestryValue, string $fatherAncestryValue): bool
    {
        $wizardCombination = [BloodStatus::MUGGLE_BORN, BloodStatus::HALF_BLOOD, BloodStatus::WIZARD];

        return in_array($motherAncestryValue, $wizardCombination) && in_array($fatherAncestryValue, $wizardCombination);
    }
}
