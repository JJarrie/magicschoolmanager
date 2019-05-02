<?php

namespace App\Entity;

use App\Entity\Traits\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CampaignRepository")
 */
class Campaign
{
    use EntityIdTrait;

    /**
     * @var User|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $user;

    /**
     * @var string|null
     *
     * @ORM\Column
     * @Assert\Length(max=255)
     */
    private $name;

    public function getUser(): ?User
    {
        return $this->user;
    }
}
