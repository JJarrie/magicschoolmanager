<?php

namespace App\Controller;

use App\Domain\MagicSchool\MagicSchoolConfiguration;
use App\Domain\MagicSchool\MagicSchoolState;
use App\Domain\MagicSchool\Student\Generator\StudentGeneratorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class StudentController
{
    private Environment $twig;
    private MagicSchoolConfiguration $magicSchoolConfiguration;
    private MagicSchoolState $magicScoolState;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
        $this->magicSchoolConfiguration = new MagicSchoolConfiguration(2019, 11, 7, 1, 9);
        $this->magicScoolState = new MagicSchoolState(1, 8, 6);
    }

    /**
     * @Route("/student/generate/{number}", name="app_student_generate_most")
     */
    public function generateMost(StudentGeneratorInterface $studentGenerator, int $number): Response
    {
        $students = [];
        for (; $number > 0; --$number) {
            $students[] = $studentGenerator->generate($this->magicSchoolConfiguration, $this->magicScoolState);
        }

        return new Response($this->twig->render('student/generateMost.html.twig', ['students' => $students]));
    }

    /**
     * @Route("/student/generate", name="app_student_generate_one")
     */
    public function generateOne(StudentGeneratorInterface $studentGenerator): Response
    {
        $responseContent = $this->twig->render('student/generateOne.html.twig', [
            'student' => $studentGenerator->generate($this->magicSchoolConfiguration, $this->magicScoolState),
        ]);

        return new Response($responseContent);
    }
}
