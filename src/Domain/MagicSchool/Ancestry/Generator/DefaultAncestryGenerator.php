<?php

namespace App\Domain\MagicSchool\Ancestry\Generator;

use App\Domain\MagicSchool\Ancestry\Ancestry;
use App\Domain\MagicSchool\Ancestry\AncestryInterface;
use App\Domain\MagicSchool\Ancestry\Resolver\AncestryResolverInterface;

class DefaultAncestryGenerator implements AncestryGeneratorInterface
{
    private $firstGenerationAncestryGenerator;
    private $ancestryResolver;

    public function __construct(FirstGenerationAncestryGenerator $firstGenerationAncestryGenerator, AncestryResolverInterface $ancestryResolver)
    {
        $this->firstGenerationAncestryGenerator = $firstGenerationAncestryGenerator;
        $this->ancestryResolver = $ancestryResolver;
    }

    public function generate(): AncestryInterface
    {
        $mother = $this->firstGenerationAncestryGenerator->generate();
        $father = $this->firstGenerationAncestryGenerator->generate();

        return new Ancestry($this->ancestryResolver->resolve($mother, $father), $mother, $father);
    }
}
