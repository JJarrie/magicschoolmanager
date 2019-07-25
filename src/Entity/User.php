<?php

namespace App\Entity;

use App\Domain\User\DTO\CreateUserDto;
use App\Domain\User\UserInterface;
use App\Entity\Traits\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Security\Core\User\UserInterface as SfUserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\User\Repository\DoctrineUserRepository")
 * @ORM\HasLifecycleCallbacks
 */
class User implements SfUserInterface, UserInterface
{
    use EntityIdTrait;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $lastname;

    /**
     * @ORM\Column(type="json")
     */
    private $roles;

    /**
     * @ORM\Column(type="string")
     */
    private $password;

    private function __construct(string $username, string $firstname, string $lastname, array $roles, string $password)
    {
        $this->id = Uuid::uuid4();
        $this->username = $username;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->roles = $roles;
        $this->password = $password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getSalt(): string
    {
        return '';
    }

    public function eraseCredentials(): void
    {
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public static function createFromCreateDto(CreateUserDto $createUserDTO): self
    {
        return new self(
            $createUserDTO->getUsername(),
            $createUserDTO->getFirstname(),
            $createUserDTO->getLastname(),
            ['ROLE_USER'],
            $createUserDTO->getPassword()
        );
    }
}
