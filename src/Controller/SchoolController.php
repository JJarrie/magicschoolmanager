<?php

namespace App\Controller;

use App\Entity\School;
use App\Entity\SchoolConfiguration;
use App\Form\SchoolConfigurationFormType;
use App\Form\SchoolFormType;
use App\Repository\SchoolRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

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
    public function create(Request $request, ObjectManager $objectManager): Response
    {
        $newCampaign = new School();
        $newCampaignForm = $this->createForm(SchoolFormType::class, $newCampaign);
        $newCampaignForm->handleRequest($request);

        if ($newCampaignForm->isSubmitted() && $newCampaignForm->isValid()) {
            $objectManager->persist($newCampaign);
            $objectManager->flush();

            return $this->redirectToRoute('app_school_list');
        }

        return $this->render('app/school/create.html.twig', [
            'newCampaignForm' => $newCampaignForm->createView(),
        ]);
    }

    /**
     * @Route("/schools/edit/{uuid}", name="app_school_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ObjectManager $objectManager, SchoolRepository $schoolRepository, string $uuid): Response
    {
        $school = $schoolRepository->findOneBy(['uuid' => $uuid, 'user' => $this->getUser()]);

        if (null === $school) {
            throw new AccessDeniedException();
        }

        $editSchoolForm = $this->createForm(SchoolFormType::class, $school);
        $editSchoolForm->handleRequest($request);

        if ($editSchoolForm->isSubmitted() && $editSchoolForm->isValid()) {
            $objectManager->flush();

            return $this->redirectToRoute('app_school_list');
        }

        return $this->render('app/school/edit.html.twig', [
            'editSchoolForm' => $editSchoolForm->createView(),
        ]);
    }

    /**
     * @Route("/schools/configure/{uuid}", name="app_school_configure", methods={"GET", "POST"})
     */
    public function configuration(Request $request, ObjectManager $objectManager, SchoolRepository $schoolRepository, string $uuid): Response
    {
        $school = $schoolRepository->findOneBy(['uuid' => $uuid, 'user' => $this->getUser()]);

        if (null === $school) {
            throw new AccessDeniedException();
        }

        $configuration = $school->getConfiguration();

        if (null === $configuration) {
            $configuration = new SchoolConfiguration();
            $configuration->setSchool($school);

            $objectManager->persist($configuration);
            $objectManager->flush();
        }

        $configureSchoolForm = $this->createForm(SchoolConfigurationFormType::class, $configuration);
        $configureSchoolForm->handleRequest($request);

        if ($configureSchoolForm->isSubmitted() && $configureSchoolForm->isValid()) {
            $objectManager->flush();

            return $this->redirectToRoute('app_school_list');
        }

        return $this->render('app_school_configure.html.twig', [
            'configureSchoolForm' => $configureSchoolForm->createView(),
        ]);
    }
}
