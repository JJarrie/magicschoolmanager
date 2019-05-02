<?php

namespace App\Controller;

use App\Domain\MagicSchool\Configuration\MagicSchoolConfigurationFactory;
use App\Domain\MagicSchool\State\MagicSchoolStateFactory;
use App\Domain\MagicSchool\Student\Generator\StudentGeneratorInterface;
use App\Form\Generation\GenerationDTO;
use App\Form\Generation\GenerationFormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class StudentController
{
    private Environment $twig;
    private FormFactoryInterface $formFactory;

    public function __construct(Environment $twig, FormFactoryInterface $formFactory)
    {
        $this->twig = $twig;
        $this->formFactory = $formFactory;
    }

    /**
     * @Route("/student/generate/{number}", name="app_student_generate_most")
     */
    public function generateMost(MagicSchoolConfigurationFactory $schoolConfigurationFactory, MagicSchoolStateFactory $schoolStateFactory, StudentGeneratorInterface $studentGenerator, int $number): Response
    {
        $magicSchoolConfiguration = $schoolConfigurationFactory->createDefault();
        $magicSchoolState = $schoolStateFactory->createDefault();

        $students = [];
        for (; $number > 0; --$number) {
            $students[] = $studentGenerator->generate($magicSchoolConfiguration, $magicSchoolState);
        }

        return new Response($this->twig->render('student/generateMost.html.twig', ['students' => $students]));
    }

    /**
     * @Route("/student/generate", name="app_student_generate")
     */
    public function generate(Request $request, MagicSchoolConfigurationFactory $schoolConfigurationFactory, MagicSchoolStateFactory $schoolStateFactory, StudentGeneratorInterface $studentGenerator): Response
    {
        $students = [];

        $generationDTO = new GenerationDTO();
        $generationDTO->setSchoolConfiguration($schoolConfigurationFactory->createDefault());
        $generationDTO->setSchoolState($schoolStateFactory->createDefault());

        $generationForm = $this->formFactory->create(GenerationFormType::class, $generationDTO)
                                            ->add('submit', SubmitType::class)
                                            ->handleRequest($request)
        ;

        if ($generationForm->isSubmitted() && $generationForm->isValid()) {
            $studentCount = $generationDTO->getStudentsCount();
            for (; $studentCount > 0; --$studentCount) {
                $students[] = $studentGenerator->generate($generationDTO->getSchoolConfiguration(), $generationDTO->getSchoolState());
            }
        }

        return new Response($this->twig->render('student/generate.html.twig', [
            'students' => $students,
            'generationForm' => $generationForm->createView(),
        ]));
    }
}
