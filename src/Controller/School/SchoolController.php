<?php

namespace App\Controller\School;

use App\Domain\School\SchoolFactory;
use App\Form\SchoolFormType;
use App\Repository\SchoolRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SchoolController extends AbstractController
{
    /**
     * @Route("/schools", name="app_school_list", methods={"GET"})
     */
    public function list(SchoolRepository $schoolRepository): Response
    {
        return $this->render('app/school/list.html.twig', [
            'schools' => $schoolRepository->listByUser($this->getUser()),
        ]);
    }

    /**
     * @Route("/schools/create", name="app_school_create", methods={"GET", "POST"})
     */
    public function create(Request $request, SchoolFactory $schoolFactory): Response
    {
        $newSchoolForm = $this->createForm(SchoolFormType::class);
        $newSchoolForm->handleRequest($request);

        if ($newSchoolForm->isSubmitted() && $newSchoolForm->isValid()) {
            $newSchool = $schoolFactory->fromArray($newSchoolForm->getData());

            return $this->redirectToRoute('app_school_list');
        }

        return $this->render('app/school/create.html.twig', [
            'newSchoolForm' => $newSchoolForm->createView(),
        ]);
    }
}
