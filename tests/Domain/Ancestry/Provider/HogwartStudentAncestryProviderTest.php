<?php

namespace App\Tests\Domain\Ancestry\Provider;

use App\Domain\Hogwart\Ancestry\Provider\HogwartStudentAncestryProvider;
use App\Domain\MagicSchool\BloodStatus;
use PHPUnit\Framework\TestCase;

class HogwartStudentAncestryProviderTest extends TestCase
{
    /** @var HogwartStudentAncestryProvider */
    private $hogwartAncestryProvider;

    protected function setUp()
    {
        $this->hogwartAncestryProvider = new HogwartStudentAncestryProvider();
    }

    public function testAllContainsMuggleBorn()
    {
        $this->assertContains(
            BloodStatus::MUGGLE_BORN,
            $this->hogwartAncestryProvider->all()
        );
    }

    public function testAllContainsPureBlood()
    {
        $this->assertContains(
            BloodStatus::PURE_BLOOD,
            $this->hogwartAncestryProvider->all()
        );
    }

    public function testAllContainsHalfBlood()
    {
        $this->assertContains(
            BloodStatus::HALF_BLOOD,
            $this->hogwartAncestryProvider->all()
        );
    }

    public function testAllContainsWizard()
    {
        $this->assertContains(
            BloodStatus::WIZARD,
            $this->hogwartAncestryProvider->all()
        );
    }

    public function testRandomGetValueInAll()
    {
        $this->assertContains(
            $this->hogwartAncestryProvider->random(),
            $this->hogwartAncestryProvider->all()
        );
    }
}
