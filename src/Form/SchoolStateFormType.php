<?php

namespace App\Form;

use App\Domain\MagicSchool\MagicSchoolState;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Jérémy JARRIÉ <jeremy.jarrie@sensiolabs.com>
 */
class SchoolStateFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('currentYear', IntegerType::class)
                ->add('currentCalendarMonth', IntegerType::class)
                ->add('currentCalendarDay', IntegerType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MagicSchoolState::class,
        ]);
    }
}
