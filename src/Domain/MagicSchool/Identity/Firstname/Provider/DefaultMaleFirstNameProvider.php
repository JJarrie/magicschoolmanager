<?php

namespace App\Domain\MagicSchool\Identity\Firstname\Provider;

class DefaultMaleFirstNameProvider implements FirstNameProviderInterface
{
    public function all(): \Traversable
    {
        return new \ArrayIterator([
            'Ackley', 'Alvin', 'Andrew', 'Arthur', 'Barnett', 'Bruce', 'Carter', 'Craig',
            'Dayton', 'Edwyn', 'Hadden', 'Harrison', 'Kenneth', 'Larry', 'Norvel',
            'Oscar', 'Orsino', 'Ralph', 'Ruben', 'Warren',
        ]);
    }
}
