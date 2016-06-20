<?php

namespace ValidationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('groups', 'entity', array(
            'class' => 'MailBoxBundle:Groups',
            'property' => 'name',
            'multiple' => true,
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MailBoxBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'mailboxbundle_user';
    }
}