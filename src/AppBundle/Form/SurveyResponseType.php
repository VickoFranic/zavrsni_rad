<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SurveyResponseType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('value')
            ->add('survey', EntityType::class, array(
                'class' => 'AppBundle:Survey',
                'choice_label' => 'title'
            ))
            ->add('user', EntityType::class, array(
                'class' => 'AppBundle:User',
                'choice_label' => 'username',
            ))
            ->add('question', EntityType::class, array(
                'class' => 'AppBundle:Question',
                'choice_label' => 'text'
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\SurveyResponse'
        ));
    }
}
