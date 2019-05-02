<?php

namespace App\Domain\MagicSchool\Identity\Lastname\Provider;

class DefaultLastnameProvider implements LastNameProviderInterface
{
    public function all(): array
    {
        return [
            'Abbett', 'Ambrose', 'Barrow', 'Boggus', 'Clayborn', 'Cornett', 'Decker',
            'Dumford', 'Everton', 'Finnemore', 'Goodwyn', 'Hanford', 'Isherwood',
            'Jubb', 'Knibbs', 'Lewing', 'Maddock', 'Ruddock', 'Trickett', 'Yard',
        ];
    }
}
