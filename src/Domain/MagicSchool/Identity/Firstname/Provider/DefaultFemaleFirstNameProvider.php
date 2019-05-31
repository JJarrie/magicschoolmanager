<?php

namespace App\Domain\MagicSchool\Identity\Firstname\Provider;

class DefaultFemaleFirstNameProvider implements FirstNameProviderInterface
{
    public function all(): \Traversable
    {
        return new \ArrayIterator([
            'Amberly', 'Artemisia', 'Audra', 'Bonnie', 'Daisy', 'Debbie', 'Edna',
            'Emmeline', 'Gladwyn', 'Helen', 'Hestia', 'Maëva', 'Maida', 'Margaret',
            'Millie', 'Padma', 'Paige', 'Patsy', 'Wanda', 'Wilma',
        ]);
    }
}
