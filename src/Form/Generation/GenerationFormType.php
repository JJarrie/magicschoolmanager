<?php

namespace App\Form\Generation;

use App\Form\SchoolConfigurationFormType;
use App\Form\SchoolStateFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GenerationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('schoolState', SchoolStateFormType::class, ['compound' => true])
                ->add('schoolConfiguration', SchoolConfigurationFormType::class, ['compound' => true])
                ->add('studentsCount', IntegerType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GenerationDTO::class,
        ]);
    }
}
