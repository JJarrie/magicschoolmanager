<?php

namespace App\Controller;

use App\Domain\Generator\Int\IntGeneratorInterface;
use App\Domain\MagicSchool\Characteristics\Generator\CharacteristicsGeneratorInterface;
use App\Domain\MagicSchool\Date\DateRuleResolver;
use App\Domain\MagicSchool\Identity\Ancestry\Ancestry;
use App\Domain\MagicSchool\Identity\Ancestry\Generator\AncestryGeneratorInterface;
use App\Domain\MagicSchool\Identity\Firstname\Generator\FirstnameGeneratorInterface;
use App\Domain\MagicSchool\Identity\Gender\Generator\GenderGeneratorInterface;
use App\Domain\MagicSchool\Identity\Generator\IdentityGeneratorInterface;
use App\Domain\MagicSchool\Identity\Lastname\Generator\LastnameGeneratorInterface;
use App\Domain\MagicSchool\Identity\RaisingWorld\Generator\RaisingWorldGeneratorInterface;
use App\Domain\MagicSchool\MagicSchoolConfiguration;
use App\Domain\MagicSchool\MagicSchoolState;
use App\Domain\MagicSchool\Skills\Generator\SkillGeneratorInterface;
use App\Domain\MagicSchool\Student\Generator\StudentGeneratorInterface;
use App\Domain\MagicSchool\Student\House\Generator\HouseGeneratorInterface;
use App\Domain\MagicSchool\Wand\Generator\WandGeneratorInterface;
use IntlDateFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class GeneratorController extends AbstractController
{
    /**
     * @Route("/generator/wand", name="app_generator_wand")
     */
    public function wand(WandGeneratorInterface $wandGenerator, TranslatorInterface $translator): JsonResponse
    {
        $wand = $wandGenerator->generate();

        return new JsonResponse(
            [
                'wood' => $translator->trans($wand->getEssenceWood(), [], 'wand', 'fr'),
                'heart' => $translator->trans($wand->getHearth(), [], 'wand', 'fr'),
                'size' => $wand->getSize(),
            ]
        );
    }

    /**
     * @Route("/generator/ancestry", name="app_generator_ancestry")
     */
    public function ancestry(AncestryGeneratorInterface $ancestryGenerator, TranslatorInterface $translator): JsonResponse
    {
        $ancestry = $ancestryGenerator->generate();
        $fatherAncestry = $ancestry->getFatherAncestry();
        $motherAncestry = $ancestry->getMotherAncestry();

        return new JsonResponse([
            'ancestry' => $translator->trans($ancestry->getAncestry(), [], 'ancestry', 'fr'),
            'father_ancestry' => $translator->trans(
                ($fatherAncestry instanceof Ancestry) ? $fatherAncestry->getAncestry() : '',
                [],
                'ancestry',
                'fr'
            ),
            'mother_ancestry' => $translator->trans(
                ($motherAncestry instanceof Ancestry) ? $motherAncestry->getAncestry() : '',
                [],
                'ancestry',
                'fr'
            ),
        ]);
    }

    /**
     * @Route("/generator/raising-world", name="app_generator_raising_world")
     */
    public function raisingWorld(RaisingWorldGeneratorInterface $raisingWorldGenerator, TranslatorInterface $translator): JsonResponse
    {
        return new JsonResponse([
            'world' => $translator->trans($raisingWorldGenerator->generate(), [], 'raising_world', 'fr'),
        ]);
    }

    /**
     * @Route("/generator/gender", name="app_generator_gender")
     */
    public function gender(GenderGeneratorInterface $genderGenerator, TranslatorInterface $translator): JsonResponse
    {
        return new JsonResponse(['gender' => $translator->trans($genderGenerator->generate(), [], 'gender', 'fr')]);
    }

    /**
     * @Route("/generator/firstname", name="app_generator_firstname")
     */
    public function firstname(FirstnameGeneratorInterface $firstnameGenerator, GenderGeneratorInterface $genderGenerator, TranslatorInterface $translator): JsonResponse
    {
        $gender = $genderGenerator->generate();

        return new JsonResponse([
            'gender' => $translator->trans($gender, [], 'gender', 'fr'),
            'firstname' => $firstnameGenerator->generate($gender),
        ]);
    }

    /**
     * @Route("/generator/lastname", name="app_generator_lastname")
     */
    public function lastname(LastnameGeneratorInterface $lastnameGenerator, AncestryGeneratorInterface $ancestryGenerator, TranslatorInterface $translator): JsonResponse
    {
        $ancestry = $ancestryGenerator->generate();

        return new JsonResponse([
            'ancestry' => $translator->trans($ancestry->getAncestry(), [], 'ancestry', 'fr'),
            'lastname' => $lastnameGenerator->generate($ancestry),
        ]);
    }

    /**
     * @Route("/generator/identity", name="app_generator_identity")
     */
    public function identity(IdentityGeneratorInterface $identityGenerator, DateRuleResolver $dateRuleResolver, TranslatorInterface $translator): JsonResponse
    {
        $magicSchoolConfiguration = new MagicSchoolConfiguration(2019, 11, 7, 1, 9);
        $magicScoolState = new MagicSchoolState(1, 8, 6);
        $identity = $identityGenerator->generate($magicSchoolConfiguration, $magicScoolState);
        $birthdayDate = $identity->getBirthdayDate();
        $motherAncestry = $identity->getAncestry()->getMotherAncestry();
        $fatherAncestry = $identity->getAncestry()->getFatherAncestry();

        return new JsonResponse([
            'firstname' => $identity->getFirstName(),
            'lastname' => $identity->getLastName(),
            'birthday_date' => IntlDateFormatter::formatObject($birthdayDate, IntlDateFormatter::SHORT, 'fr'),
            'age' => $dateRuleResolver->age($birthdayDate, $magicSchoolConfiguration, $magicScoolState),
            'gender' => $translator->trans($identity->getGender(), [], 'gender', 'fr'),
            'ancestry' => $translator->trans($identity->getAncestry()->getAncestry(), [], 'ancestry', 'fr'),
            'mother_ancestry' => $translator->trans(
                ($motherAncestry instanceof Ancestry) ? $motherAncestry->getAncestry() : '',
                [],
                'ancestry',
                'fr'
            ),
            'father_ancestry' => $translator->trans(
                ($fatherAncestry instanceof Ancestry) ? $fatherAncestry->getAncestry() : '',
                [],
                'ancestry',
                'fr'
            ),
            'raising_world' => $translator->trans($identity->getRaisingWorld(), [], 'raising_world', 'fr'),
        ]);
    }

    /**
     * @Route("/generator/house", name="app_generator_house")
     */
    public function house(HouseGeneratorInterface $houseGenerator, AncestryGeneratorInterface $ancestryGenerator, TranslatorInterface $translator): JsonResponse
    {
        $ancestry = $ancestryGenerator->generate();

        return new JsonResponse([
            'ancestry' => $translator->trans($ancestry->getAncestry(), [], 'ancestry', 'fr'),
            'house' => $translator->trans($houseGenerator->generate($ancestry), [], 'house', 'fr'),
        ]);
    }

    /**
     * @Route("/generator/student", name="app_generator_student")
     */
    public function student(StudentGeneratorInterface $studentGenerator, DateRuleResolver $dateRuleResolver, TranslatorInterface $translator): JsonResponse
    {
        $magicSchoolConfiguration = new MagicSchoolConfiguration(2019, 11, 7, 1, 9);
        $magicScoolState = new MagicSchoolState(1, 8, 6);
        $student = $studentGenerator->generate($magicSchoolConfiguration, $magicScoolState);
        $motherAncestry = $student->getIdentity()->getAncestry()->getMotherAncestry();
        $fatherAncestry = $student->getIdentity()->getAncestry()->getFatherAncestry();

        return new JsonResponse(
            [
                'identity' => [
                    'firstname' => $student->getIdentity()->getFirstName(),
                    'lastname' => $student->getIdentity()->getLastName(),
                    'birthday_date' => IntlDateFormatter::formatObject($student->getIdentity()->getBirthdayDate(), IntlDateFormatter::SHORT, 'fr'),
                    'age' => $dateRuleResolver->age($student->getIdentity()->getBirthdayDate(), $magicSchoolConfiguration, $magicScoolState),
                    'gender' => $translator->trans($student->getIdentity()->getGender(), [], 'gender', 'fr'),
                    'ancestry' => $translator->trans($student->getIdentity()->getAncestry()->getAncestry(), [], 'ancestry', 'fr'),
                    'mother_ancestry' => $translator->trans(
                        ($motherAncestry instanceof Ancestry) ? $motherAncestry->getAncestry() : '',
                        [],
                        'ancestry',
                        'fr'
                    ),
                    'father_ancestry' => $translator->trans(
                        ($fatherAncestry instanceof Ancestry) ? $fatherAncestry->getAncestry() : '',
                        [],
                        'ancestry',
                        'fr'
                    ),
                    'raising_world' => $translator->trans($student->getIdentity()->getRaisingWorld(), [], 'raising_world', 'fr'),
                ],
                'wand' => [
                    'wood' => $translator->trans($student->getWand()->getEssenceWood(), [], 'wand', 'fr'),
                    'heart' => $translator->trans($student->getWand()->getHearth(), [], 'wand', 'fr'),
                    'size' => $student->getWand()->getSize(),
                ],
                'characteristics' => [
                    'body' => $student->getCharacteristics()->getBody(),
                    'heart' => $student->getCharacteristics()->getHeart(),
                    'spirit' => $student->getCharacteristics()->getSpirit(),
                    'magic' => $student->getCharacteristics()->getMagic(),
                ],
                'skills' => [
                    'accuracy' => $student->getSkills()->getAccuracy(),
                    'bluff' => $student->getSkills()->getBluff(),
                    'decorum' => $student->getSkills()->getDecorum(),
                    'discretion' => $student->getSkills()->getDiscretion(),
                    'fight' => $student->getSkills()->getFight(),
                    'joke' => $student->getSkills()->getJoke(),
                    'perception' => $student->getSkills()->getPerception(),
                    'persuasion' => $student->getSkills()->getPersuasion(),
                    'romance' => $student->getSkills()->getRomance(),
                    'rumor' => $student->getSkills()->getRumor(),
                    'stamina' => $student->getSkills()->getStamina(),
                    'tactical' => $student->getSkills()->getTactical(),
                ],
                'house' => $translator->trans($student->getHouse(), [], 'house', 'fr'),
                'currentYear' => $student->getCurrentYear(),
            ]
        );
    }

    /**
     * @Route("/generator/characteristics", name="app_generator_characteristics")
     */
    public function characteristics(CharacteristicsGeneratorInterface $characteristicsGenerator, IntGeneratorInterface $intGenerator): JsonResponse
    {
        $year = $intGenerator->generateBetween(1, 7);
        $characteristics = $characteristicsGenerator->generate($year);

        return new JsonResponse([
            'year' => $year,
            'body' => $characteristics->getBody(),
            'heart' => $characteristics->getHeart(),
            'spirit' => $characteristics->getSpirit(),
            'magic' => $characteristics->getMagic(),
        ]);
    }

    /**
     * @Route("/generator/skills", name="app_generator_skills")
     */
    public function skills(IntGeneratorInterface $intGenerator, CharacteristicsGeneratorInterface $characteristicsGenerator, SkillGeneratorInterface $skillGenerator): JsonResponse
    {
        $year = $intGenerator->generateBetween(1, 7);
        $characteristics = $characteristicsGenerator->generate($year);
        $skills = $skillGenerator->generate($characteristics);

        return new JsonResponse([
            'year' => $year,
            'characteristics' => [
                'body' => $characteristics->getBody(),
                'heart' => $characteristics->getHeart(),
                'spirit' => $characteristics->getSpirit(),
                'magic' => $characteristics->getMagic(),
            ],
            'skills' => [
                'accuracy' => $skills->getAccuracy(),
                'bluff' => $skills->getBluff(),
                'decorum' => $skills->getDecorum(),
                'discretion' => $skills->getDiscretion(),
                'fight' => $skills->getFight(),
                'joke' => $skills->getJoke(),
                'perception' => $skills->getPerception(),
                'persuasion' => $skills->getPersuasion(),
                'romance' => $skills->getRomance(),
                'rumor' => $skills->getRumor(),
                'stamina' => $skills->getStamina(),
                'tactical' => $skills->getTactical(),
            ],
        ]);
    }
}
