<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

trait EntityIdTrait
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     */
    private ?UuidInterface $id;

    public function getId(): ?UuidInterface
    {
        return $this->id;
    }
}
