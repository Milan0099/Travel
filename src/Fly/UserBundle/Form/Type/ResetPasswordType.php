<?php


namespace Fly\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ResetPasswordType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('password', 'repeated', array(
		'type' => 'password',
		'invalid_message' => 'The password fields must match.',
		'options' => array('attr' => array('class' => 'password-field')),
		'required' => true,
		'first_options'  => array('label' => 'Password'),
		'second_options' => array('label' => 'Repeat Password'),
	    ));

    }
     
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Fly\UserBundle\Entity\User'
        ));
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return 'fly_userbundle_user_resetpassword';
    }
}
