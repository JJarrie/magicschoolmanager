<?php

namespace App\Domain\MagicSchool\Identity\Firstname\Provider;

class DefaultFemaleFirstNameProvider implements FemaleFirstnameProviderInterface
{
    public function all(): array
    {
        return [
            'Amberly', 'Artemisia', 'Audra', 'Bonnie', 'Daisy', 'Debbie', 'Edna',
            'Emmeline', 'Gladwyn', 'Helen', 'Hestia', 'Maëva', 'Maida', 'Margaret',
            'Millie', 'Padma', 'Paige', 'Patsy', 'Wanda', 'Wilma', 'Kathleen', 'Alexa',
            'Kyla', 'Blair', 'Lexie', 'Cassy', 'Meagan', 'Darla', 'Molly', 'Doraleen',
            'Opal', 'Ethel', 'Robin', 'Hayley', 'Sally', 'Helen', 'Skye', 'Jessie',
            'Vesper', 'Joyce', 'Abby', 'Kristen', 'Almina', 'Laureen', 'Calyptia',
            'Melody', 'Dawn', 'Nara', 'Elena', 'Piper', 'Gemma', 'Ruby', 'Heaven',
            'Sidney', 'Jena', 'Talia', 'Joan', 'Violet', 'Maureen', 'Cecil',
        ];
    }
}
