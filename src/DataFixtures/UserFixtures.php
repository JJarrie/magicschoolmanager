<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User('admin', ['ROLE_ADMIN']);
        $password = $this->passwordEncoder->encodePassword($user, 'admin');
        $user = new User($user->getUsername(), $user->getRoles(), $password);
        $manager->persist($user);

        $user = new User('user', ['ROLE_ADMIN']);
        $password = $this->passwordEncoder->encodePassword($user, 'user');
        $user = new User($user->getUsername(), $user->getRoles(), $password);
        $manager->persist($user);

        $manager->flush();
    }
}
