<?php

namespace App\Entity\School;

use App\Entity\Traits\EntityIdTrait;
use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SchoolRepository")
 * @ORM\HasLifecycleCallbacks
 */
class SchoolEntity
{
    use EntityIdTrait;

    /**
     * @ORM\Column
     * @Assert\Length(max=255)
     */
    private string $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User")
     */
    private User $owner;

    public function __construct(UuidInterface $id, string $name, User $owner)
    {
        $this->id = $id;
        $this->name = $name;
        $this->owner = $owner;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }
}
