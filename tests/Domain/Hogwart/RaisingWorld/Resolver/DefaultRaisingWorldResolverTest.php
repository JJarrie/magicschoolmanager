<?php

namespace App\Tests\Domain\Hogwart\RaisingWorld\Resolver;

use App\Domain\MagicSchool\Ancestry\Ancestry;
use App\Domain\MagicSchool\BloodStatusConstant;
use App\Domain\MagicSchool\RaisingWorld\Generator\DefaultRaisingWorldGenerator;
use App\Domain\MagicSchool\RaisingWorld\Provider\DefaultRaisingWorldProvider;
use App\Domain\MagicSchool\RaisingWorld\Resolver\DefaultRaisingWorldResolver;
use App\Domain\MagicSchool\RaisingWorldConstant;
use PHPUnit\Framework\TestCase;

class DefaultRaisingWorldResolverTest extends TestCase
{
    /** @var DefaultRaisingWorldResolver */
    private $raisingWorldResolver;

    protected function setUp()
    {
        $raisingWorldProvider = new DefaultRaisingWorldProvider();
        $raisingWorldGenerator = new DefaultRaisingWorldGenerator($raisingWorldProvider);
        $this->raisingWorldResolver = new DefaultRaisingWorldResolver($raisingWorldGenerator);
    }

    public function testMuggleBornIsRaisingIntoMuggleWorld()
    {
        $muggleBornAncestry = new Ancestry(BloodStatusConstant::MUGGLE_BORN);
        $this->assertEquals(
            RaisingWorldConstant::MUGGLES_WORLD,
            $this->raisingWorldResolver->resolve($muggleBornAncestry)->getWorld()
        );
    }

    public function testPureBloodIsRaisingIntoWizardWorld()
    {
        $muggleBornAncestry = new Ancestry(BloodStatusConstant::PURE_BLOOD);
        $this->assertEquals(
            RaisingWorldConstant::WIZARDS_WORLD,
            $this->raisingWorldResolver->resolve($muggleBornAncestry)->getWorld()
        );
    }

    public function testWizardIsRaisingIntoWizardWorld()
    {
        $muggleBornAncestry = new Ancestry(BloodStatusConstant::WIZARD);
        $this->assertEquals(
            RaisingWorldConstant::WIZARDS_WORLD,
            $this->raisingWorldResolver->resolve($muggleBornAncestry)->getWorld()
        );
    }
}
