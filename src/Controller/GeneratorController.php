<?php

namespace App\Controller;

use App\Domain\MagicSchool\Ancestry\Generator\AncestryGeneratorInterface;
use App\Domain\MagicSchool\RaisingWorld\Generator\RaisingWorldGeneratorInterface;
use App\Domain\MagicSchool\Wand\Generator\WandGeneratorInterface;
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

        return new JsonResponse([
            'ancestry' => $translator->trans($ancestry->getAncestry(), [], 'ancestry', 'fr'),
            'father_ancestry' => $translator->trans($ancestry->getFatherAncestry()->getAncestry(), [], 'ancestry', 'fr'),
            'mother_ancestry' => $translator->trans($ancestry->getMotherAncestry()->getAncestry(), [], 'ancestry', 'fr'),
        ]);
    }

    /**
     * @Route("/generator/raising-world", name="app_generator_ancestry")
     */
    public function raisingWorld(RaisingWorldGeneratorInterface $raisingWorldGenerator, TranslatorInterface $translator): JsonResponse
    {
        $raisingWorld = $raisingWorldGenerator->generate();

        return new JsonResponse([
            'world' => $translator->trans($raisingWorld->getWorld(), [], 'raising_world', 'fr'),
        ]);
    }
}
