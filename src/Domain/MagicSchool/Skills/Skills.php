<?php

namespace App\Domain\MagicSchool\Skills;

class Skills
{
    private int $bluff;
    private int $joke;
    private int $tactical;
    private int $rumor;
    private int $decorum;
    private int $discretion;
    private int $persuasion;
    private int $romance;
    private int $fight;
    private int $stamina;
    private int $perception;
    private int $accuracy;

    public function __construct(int $bluff, int $joke, int $tactical, int $rumor, int $decorum, int $discretion, int $persuasion, int $romance, int $fight, int $stamina, int $perception, int $accuracy)
    {
        $this->bluff = $bluff;
        $this->joke = $joke;
        $this->tactical = $tactical;
        $this->rumor = $rumor;
        $this->decorum = $decorum;
        $this->discretion = $discretion;
        $this->persuasion = $persuasion;
        $this->romance = $romance;
        $this->fight = $fight;
        $this->stamina = $stamina;
        $this->perception = $perception;
        $this->accuracy = $accuracy;
    }

    public function incrementBluff(): void
    {
        ++$this->bluff;
    }

    public function getBluff(): int
    {
        return $this->bluff;
    }

    public function incrementJoke(): void
    {
        ++$this->joke;
    }

    public function getJoke(): int
    {
        return $this->joke;
    }

    public function incrementTactical(): void
    {
        ++$this->tactical;
    }

    public function getTactical(): int
    {
        return $this->tactical;
    }

    public function incrementRumor(): void
    {
        ++$this->rumor;
    }

    public function getRumor(): int
    {
        return $this->rumor;
    }

    public function incrementDecorum(): void
    {
        ++$this->decorum;
    }

    public function getDecorum(): int
    {
        return $this->decorum;
    }

    public function incrementDiscretion(): void
    {
        ++$this->discretion;
    }

    public function getDiscretion(): int
    {
        return $this->discretion;
    }

    public function incrementPersuasion(): void
    {
        ++$this->persuasion;
    }

    public function getPersuasion(): int
    {
        return $this->persuasion;
    }

    public function incrementRomance(): void
    {
        ++$this->romance;
    }

    public function getRomance(): int
    {
        return $this->romance;
    }

    public function incrementFight(): void
    {
        ++$this->fight;
    }

    public function getFight(): int
    {
        return $this->fight;
    }

    public function incrementStamina(): void
    {
        ++$this->stamina;
    }

    public function getStamina(): int
    {
        return $this->stamina;
    }

    public function incrementPerception(): void
    {
        ++$this->perception;
    }

    public function getPerception(): int
    {
        return $this->perception;
    }

    public function incrementAccuracy(): void
    {
        ++$this->accuracy;
    }

    public function getAccuracy(): int
    {
        return $this->accuracy;
    }
}
