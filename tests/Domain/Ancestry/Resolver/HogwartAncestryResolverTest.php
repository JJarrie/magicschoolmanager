<?php

namespace App\Tests\Domain\Ancestry\Resolver;

use App\Domain\Hogwart\Ancestry\Resolver\HogwartAncestryResolver;
use App\Domain\MagicSchool\Ancestry\Ancestry;
use App\Domain\MagicSchool\BloodStatus;
use PHPUnit\Framework\TestCase;

class HogwartAncestryResolverTest extends TestCase
{
    /** @var HogwartAncestryResolver */
    private $hogwartAncestryResolver;

    protected function setUp()
    {
        $this->hogwartAncestryResolver = new HogwartAncestryResolver();
    }

    public function testPureBloodMotherAndPureBloodFatherGivePureBloodChildren()
    {
        $pureBloodMother = new Ancestry(BloodStatus::PURE_BLOOD);
        $pureBloodFather = new Ancestry(BloodStatus::PURE_BLOOD);
        $ancestry = $this->hogwartAncestryResolver->resolve($pureBloodMother, $pureBloodFather);

        $this->assertEquals(BloodStatus::PURE_BLOOD, $ancestry);
    }

    public function testMuggleMotherAndMuggleFatherGiveMuggleBornChildren()
    {
        $pureBloodMother = new Ancestry(BloodStatus::MUGGLE);
        $pureBloodFather = new Ancestry(BloodStatus::MUGGLE);
        $ancestry = $this->hogwartAncestryResolver->resolve($pureBloodMother, $pureBloodFather);

        $this->assertEquals(BloodStatus::MUGGLE_BORN, $ancestry);
    }

    public function testMuggleBornMotherAndMuggleFatherGiveHalfBloodChildren()
    {
        $pureBloodMother = new Ancestry(BloodStatus::MUGGLE_BORN);
        $pureBloodFather = new Ancestry(BloodStatus::MUGGLE);
        $ancestry = $this->hogwartAncestryResolver->resolve($pureBloodMother, $pureBloodFather);

        $this->assertEquals(BloodStatus::HALF_BLOOD, $ancestry);
    }

    public function testMuggleMotherAndMuggleBornFatherGiveHalfBloodChildren()
    {
        $pureBloodMother = new Ancestry(BloodStatus::MUGGLE);
        $pureBloodFather = new Ancestry(BloodStatus::MUGGLE_BORN);
        $ancestry = $this->hogwartAncestryResolver->resolve($pureBloodMother, $pureBloodFather);

        $this->assertEquals(BloodStatus::HALF_BLOOD, $ancestry);
    }

    public function testMuggleBornMotherAndMuggleBornFatherGiveWizardChildren()
    {
        $pureBloodMother = new Ancestry(BloodStatus::MUGGLE_BORN);
        $pureBloodFather = new Ancestry(BloodStatus::MUGGLE_BORN);
        $ancestry = $this->hogwartAncestryResolver->resolve($pureBloodMother, $pureBloodFather);

        $this->assertEquals(BloodStatus::WIZARD, $ancestry);
    }

    public function testHalfBloodMotherAndHalfBloodFatherGiveWizardChildren()
    {
        $pureBloodMother = new Ancestry(BloodStatus::HALF_BLOOD);
        $pureBloodFather = new Ancestry(BloodStatus::HALF_BLOOD);
        $ancestry = $this->hogwartAncestryResolver->resolve($pureBloodMother, $pureBloodFather);

        $this->assertEquals(BloodStatus::WIZARD, $ancestry);
    }

    public function testWizardMotherAndWizardFatherGiveWizardChildren()
    {
        $pureBloodMother = new Ancestry(BloodStatus::WIZARD);
        $pureBloodFather = new Ancestry(BloodStatus::WIZARD);
        $ancestry = $this->hogwartAncestryResolver->resolve($pureBloodMother, $pureBloodFather);

        $this->assertEquals(BloodStatus::WIZARD, $ancestry);
    }


    public function testMuggleBornMotherAndWizardFatherGiveWizardChildren()
    {
        $pureBloodMother = new Ancestry(BloodStatus::MUGGLE_BORN);
        $pureBloodFather = new Ancestry(BloodStatus::WIZARD);
        $ancestry = $this->hogwartAncestryResolver->resolve($pureBloodMother, $pureBloodFather);

        $this->assertEquals(BloodStatus::WIZARD, $ancestry);
    }
}
