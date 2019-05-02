<?php

namespace App\Tests\Domain\MagicSchool\Identity\Ancestry\Resolver;

use App\Domain\MagicSchool\BloodStatusConstant;
use App\Domain\MagicSchool\Identity\Ancestry\Ancestry;
use App\Domain\MagicSchool\Identity\Ancestry\Resolver\DefaultAncestryResolver;
use PHPUnit\Framework\TestCase;

class DefaultAncestryResolverTest extends TestCase
{
    /** @var DefaultAncestryResolver */
    private $hogwartAncestryResolver;

    protected function setUp()
    {
        $this->hogwartAncestryResolver = new DefaultAncestryResolver();
    }

    public function testPureBloodMotherAndPureBloodFatherGivePureBloodChildren()
    {
        $pureBloodMother = new Ancestry(BloodStatusConstant::PURE_BLOOD);
        $pureBloodFather = new Ancestry(BloodStatusConstant::PURE_BLOOD);
        $ancestry = $this->hogwartAncestryResolver->resolve($pureBloodMother, $pureBloodFather);

        $this->assertEquals(BloodStatusConstant::PURE_BLOOD, $ancestry);
    }

    public function testMuggleMotherAndMuggleFatherGiveMuggleBornChildren()
    {
        $muggleMother = new Ancestry(BloodStatusConstant::MUGGLE);
        $muggleFather = new Ancestry(BloodStatusConstant::MUGGLE);
        $ancestry = $this->hogwartAncestryResolver->resolve($muggleMother, $muggleFather);

        $this->assertEquals(BloodStatusConstant::MUGGLE_BORN, $ancestry);
    }

    public function testMuggleBornMotherAndMuggleFatherGiveHalfBloodChildren()
    {
        $muggleBornMother = new Ancestry(BloodStatusConstant::MUGGLE_BORN);
        $muggleFather = new Ancestry(BloodStatusConstant::MUGGLE);
        $ancestry = $this->hogwartAncestryResolver->resolve($muggleBornMother, $muggleFather);

        $this->assertEquals(BloodStatusConstant::HALF_BLOOD, $ancestry);
    }

    public function testMuggleMotherAndMuggleBornFatherGiveHalfBloodChildren()
    {
        $muggleMother = new Ancestry(BloodStatusConstant::MUGGLE);
        $muggleBornFather = new Ancestry(BloodStatusConstant::MUGGLE_BORN);
        $ancestry = $this->hogwartAncestryResolver->resolve($muggleMother, $muggleBornFather);

        $this->assertEquals(BloodStatusConstant::HALF_BLOOD, $ancestry);
    }

    public function testMuggleBornMotherAndMuggleBornFatherGiveWizardChildren()
    {
        $muggleBornMother = new Ancestry(BloodStatusConstant::MUGGLE_BORN);
        $muggleBornFather = new Ancestry(BloodStatusConstant::MUGGLE_BORN);
        $ancestry = $this->hogwartAncestryResolver->resolve($muggleBornMother, $muggleBornFather);

        $this->assertEquals(BloodStatusConstant::WIZARD, $ancestry);
    }

    public function testHalfBloodMotherAndHalfBloodFatherGiveWizardChildren()
    {
        $halfBloodMother = new Ancestry(BloodStatusConstant::HALF_BLOOD);
        $halfBloodFather = new Ancestry(BloodStatusConstant::HALF_BLOOD);
        $ancestry = $this->hogwartAncestryResolver->resolve($halfBloodMother, $halfBloodFather);

        $this->assertEquals(BloodStatusConstant::WIZARD, $ancestry);
    }

    public function testWizardMotherAndWizardFatherGiveWizardChildren()
    {
        $wizardMother = new Ancestry(BloodStatusConstant::WIZARD);
        $wizardFather = new Ancestry(BloodStatusConstant::WIZARD);
        $ancestry = $this->hogwartAncestryResolver->resolve($wizardMother, $wizardFather);

        $this->assertEquals(BloodStatusConstant::WIZARD, $ancestry);
    }


    public function testMuggleBornMotherAndWizardFatherGiveWizardChildren()
    {
        $pureBloodMother = new Ancestry(BloodStatusConstant::MUGGLE_BORN);
        $wizardFather = new Ancestry(BloodStatusConstant::WIZARD);
        $ancestry = $this->hogwartAncestryResolver->resolve($pureBloodMother, $wizardFather);

        $this->assertEquals(BloodStatusConstant::WIZARD, $ancestry);
    }

    public function testWizardMotherAndPureBloodFatherGiveWizardChildren()
    {
        $wizardMother = new Ancestry(BloodStatusConstant::WIZARD);
        $pureBloodFather = new Ancestry(BloodStatusConstant::PURE_BLOOD);
        $ancestry = $this->hogwartAncestryResolver->resolve($wizardMother, $pureBloodFather);

        $this->assertEquals(BloodStatusConstant::WIZARD, $ancestry);

    }
}
