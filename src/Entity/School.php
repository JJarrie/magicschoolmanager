<?php

namespace App\Entity;

use App\Entity\Traits\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SchoolRepository")
 * @ORM\HasLifecycleCallbacks
 */
class School implements OwnableEntityInterface
{
    use EntityIdTrait;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $user;

    /**
     * @ORM\Column
     * @Assert\Length(max=255)
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\SchoolConfiguration", mappedBy="school")
     */
    private $configuration;

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getConfiguration(): ?SchoolConfiguration
    {
        return $this->configuration;
    }

    public function setConfiguration(SchoolConfiguration $configuration): void
    {
        $this->configuration = $configuration;
    }
}
