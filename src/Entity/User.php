<?php

namespace App\Entity;

use App\Entity\Traits\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks
 */
class User implements UserInterface
{
    use EntityIdTrait;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles;

    /**
     * @var string|null The hashed password
     *
     * @ORM\Column(type="string")
     */
    private $password;

    public function __construct(string $username, array $roles, ?string $password = null)
    {
        $this->id = Uuid::uuid4();
        $this->username = $username;
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

    public function getPassword(): ?string
    {
        return (string) $this->password;
    }

    public function getSalt()
    {
    }

    public function eraseCredentials(): void
    {
    }
}
