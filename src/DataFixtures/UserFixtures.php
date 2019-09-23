<?php

namespace App\DataFixtures;

use App\Domain\User\DTO\CreateUserDto;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private UserPasswordEncoderInterface $passwordEncoder;

    private const USERS = [
        [
            'firstname' => 'Général',
            'lastname' => 'Administrator',
            'username' => 'Admin',
            'plainPassword' => 'admin',
            'roles' => ['ROLE_ADMIN'],
        ],
    ];

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        foreach (self::USERS as $userDatas) {
            $tmpCreateUserDto = new CreateUserDto(
                $userDatas['firstname'],
                $userDatas['lastname'],
                $userDatas['username'],
                '',
                $userDatas['roles']
            );
            $user = User::createFromCreateDto($tmpCreateUserDto);

            $password = $this->passwordEncoder->encodePassword($user, $userDatas['plainPassword']);
            $finalCreateUserDto = new CreateUserDto(
                $userDatas['firstname'],
                $userDatas['lastname'],
                $userDatas['username'],
                $password,
                $userDatas['roles']
            );
            $user = User::createFromCreateDto($finalCreateUserDto);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
