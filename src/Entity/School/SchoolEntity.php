<?php

namespace App\Entity\School;

use App\Entity\Traits\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Security\Core\User\UserInterface;
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
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $owner;

    public function __construct(UuidInterface $id, string $name, UserInterface $owner)
    {
        $this->id = $id;
        $this->name = $name;
        $this->owner = $owner;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getOwner(): ?UserInterface
    {
        return $this->owner;
    }
}
