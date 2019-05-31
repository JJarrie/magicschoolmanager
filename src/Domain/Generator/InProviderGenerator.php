<?php

namespace App\Domain\Generator;

use App\Domain\Provider\ProviderInterface;

class InProviderGenerator implements GeneratorInterface
{
    protected $provider;

    public function __construct(ProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    public function generate()
    {
        $pool = $this->provider->all();
        $key = array_rand(iterator_to_array($pool));

        return $pool[$key];
    }
}
