<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 02/05/2017
 * Time: 15:21
 */

namespace Traveller\TravelAdvisorBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class loginForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mail', EmailType::class)
            ->add('mdp', TextType::class)
            ->add('submit', SubmitType::class);
//        $builder
//            ->add('name', TextType::class, array(
//                'attr' => array(
//                    'placeholder' => 'Saisir votre nom'),
//                    'required'  => false,
//                    'trim'      => true,
//                    'constraints' => array(
//                        new Assert\NotBlank(array(
//                            "message" => "remplir ce champ")
//                        )
//                    )
//            ))
//            ->add('email', EmailType::class, array(
//                'attr' => array(
//                    'placeholder' => 'Saisir votre mail'),
//                    'constraints' => array(
//                        new Assert\Email(array(
//                            "message" => "mail {{ value }} invalide",
//                            "checkMX" => true
//                        )
//                    )
//            ))
//            )
//            ->add('sujet', TextType::class)
//            ->add('body', TextareaType::class)
//            ->add('submit', SubmitType::class);
    }

    public function getName(){
        return 'login';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Traveller\TravelAdvisorBundle\Entity\Membre'
        ));
    }

}