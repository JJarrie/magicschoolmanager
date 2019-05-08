<?php

namespace App\Tests\Domain\Hogwart\Ancestry\Resolver;

use App\Domain\MagicSchool\Ancestry\Ancestry;
use App\Domain\MagicSchool\Ancestry\Resolver\DefaultAncestryResolver;
use App\Domain\MagicSchool\BloodStatusConstant;
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
        $pureBloodMother = new Ancestry(BloodStatusConstant::MUGGLE);
        $pureBloodFather = new Ancestry(BloodStatusConstant::MUGGLE);
        $ancestry = $this->hogwartAncestryResolver->resolve($pureBloodMother, $pureBloodFather);

        $this->assertEquals(BloodStatusConstant::MUGGLE_BORN, $ancestry);
    }

    public function testMuggleBornMotherAndMuggleFatherGiveHalfBloodChildren()
    {
        $pureBloodMother = new Ancestry(BloodStatusConstant::MUGGLE_BORN);
        $pureBloodFather = new Ancestry(BloodStatusConstant::MUGGLE);
        $ancestry = $this->hogwartAncestryResolver->resolve($pureBloodMother, $pureBloodFather);

        $this->assertEquals(BloodStatusConstant::HALF_BLOOD, $ancestry);
    }

    public function testMuggleMotherAndMuggleBornFatherGiveHalfBloodChildren()
    {
        $pureBloodMother = new Ancestry(BloodStatusConstant::MUGGLE);
        $pureBloodFather = new Ancestry(BloodStatusConstant::MUGGLE_BORN);
        $ancestry = $this->hogwartAncestryResolver->resolve($pureBloodMother, $pureBloodFather);

        $this->assertEquals(BloodStatusConstant::HALF_BLOOD, $ancestry);
    }

    public function testMuggleBornMotherAndMuggleBornFatherGiveWizardChildren()
    {
        $pureBloodMother = new Ancestry(BloodStatusConstant::MUGGLE_BORN);
        $pureBloodFather = new Ancestry(BloodStatusConstant::MUGGLE_BORN);
        $ancestry = $this->hogwartAncestryResolver->resolve($pureBloodMother, $pureBloodFather);

        $this->assertEquals(BloodStatusConstant::WIZARD, $ancestry);
    }

    public function testHalfBloodMotherAndHalfBloodFatherGiveWizardChildren()
    {
        $pureBloodMother = new Ancestry(BloodStatusConstant::HALF_BLOOD);
        $pureBloodFather = new Ancestry(BloodStatusConstant::HALF_BLOOD);
        $ancestry = $this->hogwartAncestryResolver->resolve($pureBloodMother, $pureBloodFather);

        $this->assertEquals(BloodStatusConstant::WIZARD, $ancestry);
    }

    public function testWizardMotherAndWizardFatherGiveWizardChildren()
    {
        $pureBloodMother = new Ancestry(BloodStatusConstant::WIZARD);
        $pureBloodFather = new Ancestry(BloodStatusConstant::WIZARD);
        $ancestry = $this->hogwartAncestryResolver->resolve($pureBloodMother, $pureBloodFather);

        $this->assertEquals(BloodStatusConstant::WIZARD, $ancestry);
    }


    public function testMuggleBornMotherAndWizardFatherGiveWizardChildren()
    {
        $pureBloodMother = new Ancestry(BloodStatusConstant::MUGGLE_BORN);
        $pureBloodFather = new Ancestry(BloodStatusConstant::WIZARD);
        $ancestry = $this->hogwartAncestryResolver->resolve($pureBloodMother, $pureBloodFather);

        $this->assertEquals(BloodStatusConstant::WIZARD, $ancestry);
    }
}
