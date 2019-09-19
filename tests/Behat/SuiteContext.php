<?php

declare(strict_types=1);

namespace App\Tests\Behat;

use App\Kernel;
use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeFeatureScope;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\SchemaTool;
use Symfony\Component\HttpKernel\KernelInterface;
use Behat\Testwork\Hook\Scope\BeforeSuiteScope;

/**
 * This context class contains the definitions of the steps used by the demo
 * feature file. Learn how to get started with Behat and BDD on Behat's website.
 *
 * @see http://behat.org/en/latest/quick_start.html
 */
final class SuiteContext implements Context
{
    /** @var KernelInterface */
    private $kernel;

    private $entityManager;

    public function __construct(KernelInterface $kernel, EntityManagerInterface $objectManager)
    {
        $this->kernel = $kernel;
        $this->entityManager = $objectManager;
    }

    /**
     * @BeforeScenario
     */
    public function schemaUpdate(BeforeScenarioScope $beforeScenarioScope)
    {
        $metadatas = $this->entityManager->getMetadataFactory()->getAllMetadata();
        $schemaTool = new SchemaTool($this->entityManager);
        $schemaTool->createSchema($metadatas);
    }
}
