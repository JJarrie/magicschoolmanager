<?php

namespace App\Domain\MagicSchool\Identity\Lastname\Provider;

class DefaultPureBloodLastnameProvider implements PureBloodLastnameProvider
{
    public function all(): array
    {
        return [
            'Abbot', 'Avery', 'Black', 'Bulstrode', 'Beurk', 'Carrow', 'Croupton',
            'Fawley', 'Flint', 'Gaunt', 'Greengrass', 'Lestrange', 'Londubat',
            'Macmillan', 'Malefoy', 'Nott', 'Ollivander', 'Parkinson', 'Prewett',
            'Rosier', 'Rowle', 'Selwyn', 'Shackelbolt', 'Shafiq', 'Slughorn',
            'Travers', 'Weasley', 'Yaxley',
        ];
    }
}
