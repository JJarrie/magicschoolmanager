<?php

namespace App\Domain\MagicSchool\Identity\Firstname\Provider;

class DefaultMaleFirstNameProvider implements MaleFirstnameProviderInterface
{
    public function all(): array
    {
        return [
            'Ackley', 'Alvin', 'Andrew', 'Arthur', 'Barnett', 'Bruce', 'Carter', 'Craig',
            'Dayton', 'Edwyn', 'Hadden', 'Harrison', 'Kenneth', 'Larry', 'Norvel', 'Bryce',
            'Oscar', 'Orsino', 'Ralph', 'Ruben', 'Warren', 'Stanley', 'Clive', 'Wyatt',
            'Daniel', 'Aiden', 'Devin', 'Alvin', 'Drew', 'Audric', 'Embry', 'Bancroft',
            'Elwood', 'Buster', 'Hollis', 'Brent', 'Layton', 'Casey', 'Milton', 'Marlow',
            'Chris', 'Redford', 'Cliff', 'Tate', 'Curtis', 'Olin', 'Cooper', 'Emmett',
            'Aaron', 'Dean', 'Alexus', 'Dorian', 'Andy', 'Dwayne', 'Arundel', 'Chad',
            'Bartholomew', 'Finn', 'Bolton', 'Hunter',
        ];
    }
}
