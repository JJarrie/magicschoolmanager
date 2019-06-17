<?php

namespace App\Domain\MagicSchool\Characteristics;

class Characteristics
{
    private $heart;
    private $body;
    private $spirit;
    private $magic;

    public function __construct(int $heart, int $body, int $spirit, int $magic)
    {
        $this->heart = $heart;
        $this->body = $body;
        $this->spirit = $spirit;
        $this->magic = $magic;
    }

    public function getHeart(): int
    {
        return $this->heart;
    }

    public function getBody(): int
    {
        return $this->body;
    }

    public function getSpirit(): int
    {
        return $this->spirit;
    }

    public function getMagic(): int
    {
        return $this->magic;
    }

    public function incrementHeart(): void
    {
        ++$this->heart;
    }

    public function incrementBody(): void
    {
        ++$this->body;
    }

    public function incrementSpirit(): void
    {
        ++$this->spirit;
    }

    public function incrementMagic(): void
    {
        ++$this->magic;
    }
}
