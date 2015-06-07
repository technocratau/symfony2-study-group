<?php

namespace Technocrat\LMSBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UnitType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('number')
            ->add('date_starts', 'date', array(
                'years' => range(date('Y'), date('Y', strtotime('+5 years'))),
                'required' => TRUE,
                ))
            ->add('course', 'entity', array(
                'required' => TRUE,
                'class' => 'TechnocratLMSBundle:Course',
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Technocrat\LMSBundle\Entity\Unit'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'technocrat_lmsbundle_unit';
    }
}
