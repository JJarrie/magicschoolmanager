<?php

namespace App\Tests\Domain\Hogwart\Ancestry\Provider;

use App\Domain\MagicSchool\Ancestry\Provider\DefaultStudentAncestryProvider;
use App\Domain\MagicSchool\BloodStatusConstant;
use PHPUnit\Framework\TestCase;

class DefaultStudentAncestryProviderTest extends TestCase
{
    /** @var DefaultStudentAncestryProvider */
    private $hogwartAncestryProvider;

    protected function setUp()
    {
        $this->hogwartAncestryProvider = new DefaultStudentAncestryProvider();
    }

    public function testAllContainsMuggleBorn()
    {
        $this->assertContains(
            BloodStatusConstant::MUGGLE_BORN,
            $this->hogwartAncestryProvider->all()
        );
    }

    public function testAllContainsPureBlood()
    {
        $this->assertContains(
            BloodStatusConstant::PURE_BLOOD,
            $this->hogwartAncestryProvider->all()
        );
    }

    public function testAllContainsHalfBlood()
    {
        $this->assertContains(
            BloodStatusConstant::HALF_BLOOD,
            $this->hogwartAncestryProvider->all()
        );
    }

    public function testAllContainsWizard()
    {
        $this->assertContains(
            BloodStatusConstant::WIZARD,
            $this->hogwartAncestryProvider->all()
        );
    }
}
