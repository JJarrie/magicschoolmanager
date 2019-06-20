<?php

namespace App\Entity;

use App\Entity\Traits\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class SchoolConfiguration
{
    use EntityIdTrait;

    /**
     * @ORM\Column(type="integer")
     */
    private $yearOfStart;

    /**
     * @ORM\Column(type="integer")
     */
    private $firstYearAge;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbStudyingYear;

    /**
     * @ORM\Column(type="integer")
     * @Assert\GreaterThan(value="0")
     * @Assert\LessThanOrEqual(value="31")
     */
    private $backToSchoolDay;

    /**
     * @ORM\Column(type="integer")
     * @Assert\GreaterThan(value="0")
     * @Assert\LessThanOrEqual(value="12")
     */
    private $backToSchoolMonth;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\School", inversedBy="configuration")
     */
    private $school;

    public function getYearOfStart(): ?int
    {
        return $this->yearOfStart;
    }

    public function setYearOfStart(int $yearOfStart): void
    {
        $this->yearOfStart = $yearOfStart;
    }

    public function getFirstYearAge(): ?int
    {
        return $this->firstYearAge;
    }

    public function setFirstYearAge(int $firstYearAge): void
    {
        $this->firstYearAge = $firstYearAge;
    }

    public function getNbStudyingYear(): ?int
    {
        return $this->nbStudyingYear;
    }

    public function setNbStudyingYear(int $nbStudyingYear): void
    {
        $this->nbStudyingYear = $nbStudyingYear;
    }

    public function getBackToSchoolDay(): ?int
    {
        return $this->backToSchoolDay;
    }

    public function setBackToSchoolDay(int $backToSchoolDay): void
    {
        $this->backToSchoolDay = $backToSchoolDay;
    }

    public function getBackToSchoolMonth(): ?int
    {
        return $this->backToSchoolMonth;
    }

    public function setBackToSchoolMonth(int $backToSchoolMonth): void
    {
        $this->backToSchoolMonth = $backToSchoolMonth;
    }

    public function getSchool(): ?School
    {
        return $this->school;
    }

    public function setSchool(School $school): void
    {
        $this->school = $school;
    }
}
