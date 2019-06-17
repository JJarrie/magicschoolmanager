<?php

namespace App\Domain\MagicSchool\Identity\Ancestry\Generator;

use App\Domain\MagicSchool\Identity\Ancestry\Ancestry;
use App\Domain\MagicSchool\Identity\Ancestry\Resolver\AncestryResolverInterface;

class DefaultAncestryGenerator implements AncestryGeneratorInterface
{
    private $firstGenerationAncestryGenerator;
    private $ancestryResolver;

    public function __construct(FirstGenerationAncestryGenerator $firstGenerationAncestryGenerator, AncestryResolverInterface $ancestryResolver)
    {
        $this->firstGenerationAncestryGenerator = $firstGenerationAncestryGenerator;
        $this->ancestryResolver = $ancestryResolver;
    }

    public function generate(): Ancestry
    {
        $mother = $this->firstGenerationAncestryGenerator->generate();
        $father = $this->firstGenerationAncestryGenerator->generate();

        return new Ancestry($this->ancestryResolver->resolve($mother, $father), $mother, $father);
    }
}
