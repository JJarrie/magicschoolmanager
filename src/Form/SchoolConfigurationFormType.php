<?php

namespace App\Form;

use App\Domain\MagicSchool\MagicSchoolConfiguration;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SchoolConfigurationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('calendarYearStart', IntegerType::class)
                ->add('firstYearAge', IntegerType::class)
                ->add('nbStudyingYear', IntegerType::class)
                ->add('backToSchoolDay', IntegerType::class)
                ->add('backToSchoolMonth', IntegerType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MagicSchoolConfiguration::class,
        ]);
    }
}
