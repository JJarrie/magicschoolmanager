<?php

namespace App\Domain\MagicSchool\Identity\Ancestry\Resolver;

use App\Domain\MagicSchool\BloodStatusConstant;
use App\Domain\MagicSchool\Identity\Ancestry\Ancestry;

class DefaultAncestryResolver implements AncestryResolverInterface
{
    public function resolve(Ancestry $motherAncestry, Ancestry $fatherAncestry): string
    {
        $motherAncestryValue = $motherAncestry->getAncestry();
        $fatherAncestryValue = $fatherAncestry->getAncestry();

        if ($motherAncestryValue === $fatherAncestryValue) {
            return $this->getIfTwiceParentHaveSameAncestry($motherAncestryValue);
        }

        if ($this->parentsAncestriesAreInWizardCombination($motherAncestryValue, $fatherAncestryValue)) {
            return BloodStatusConstant::WIZARD;
        }

        return BloodStatusConstant::HALF_BLOOD;
    }

    private function getIfTwiceParentHaveSameAncestry(string $ancestryValue): string
    {
        switch ($ancestryValue) {
            case BloodStatusConstant::MUGGLE:
                return BloodStatusConstant::MUGGLE_BORN;
            case BloodStatusConstant::PURE_BLOOD:
                return BloodStatusConstant::PURE_BLOOD;
            case BloodStatusConstant::MUGGLE_BORN:
            case BloodStatusConstant::HALF_BLOOD:
            case BloodStatusConstant::WIZARD:
                return BloodStatusConstant::WIZARD;
        }

        throw new \LogicException('Unreachable');
    }

    private function parentsAncestriesAreInWizardCombination(string $motherAncestryValue, string $fatherAncestryValue): bool
    {
        $wizardCombination = [BloodStatusConstant::PURE_BLOOD, BloodStatusConstant::MUGGLE_BORN, BloodStatusConstant::HALF_BLOOD, BloodStatusConstant::WIZARD];

        return in_array($motherAncestryValue, $wizardCombination) && in_array($fatherAncestryValue, $wizardCombination);
    }
}
