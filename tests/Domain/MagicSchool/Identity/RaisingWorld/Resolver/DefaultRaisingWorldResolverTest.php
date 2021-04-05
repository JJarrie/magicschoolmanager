<?php

namespace App\Tests\Domain\MagicSchool\Identity\RaisingWorld\Resolver;

use App\Domain\Generator\ArrayGenerator;
use App\Domain\MagicSchool\BloodStatusConstant;
use App\Domain\MagicSchool\Identity\Ancestry\Ancestry;
use App\Domain\MagicSchool\Identity\RaisingWorld\Generator\DefaultRaisingWorldGenerator;
use App\Domain\MagicSchool\Identity\RaisingWorld\Provider\DefaultRaisingWorldProvider;
use App\Domain\MagicSchool\Identity\RaisingWorld\Resolver\DefaultRaisingWorldResolver;
use App\Domain\MagicSchool\RaisingWorldConstant;
use PHPUnit\Framework\TestCase;

class DefaultRaisingWorldResolverTest extends TestCase
{
    /** @var DefaultRaisingWorldResolver */
    private $raisingWorldResolver;

    protected function setUp(): void
    {
        $arrayGenerator = new ArrayGenerator();
        $raisingWorldProvider = new DefaultRaisingWorldProvider();
        $raisingWorldGenerator = new DefaultRaisingWorldGenerator($arrayGenerator, $raisingWorldProvider);
        $this->raisingWorldResolver = new DefaultRaisingWorldResolver($raisingWorldGenerator);
    }

    public function testMuggleBornIsRaisingIntoMuggleWorld()
    {
        $muggleBornAncestry = new Ancestry(BloodStatusConstant::MUGGLE_BORN);
        $this->assertEquals(
            RaisingWorldConstant::MUGGLES_WORLD,
            $this->raisingWorldResolver->resolve($muggleBornAncestry)
        );
    }

    public function testPureBloodIsRaisingIntoWizardWorld()
    {
        $muggleBornAncestry = new Ancestry(BloodStatusConstant::PURE_BLOOD);
        $this->assertEquals(
            RaisingWorldConstant::WIZARDS_WORLD,
            $this->raisingWorldResolver->resolve($muggleBornAncestry)
        );
    }

    public function testWizardIsRaisingIntoWizardWorld()
    {
        $muggleBornAncestry = new Ancestry(BloodStatusConstant::WIZARD);
        $this->assertEquals(
            RaisingWorldConstant::WIZARDS_WORLD,
            $this->raisingWorldResolver->resolve($muggleBornAncestry)
        );
    }
}
