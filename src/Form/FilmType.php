<?php

namespace App\Form;

use App\Entity\Films;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre',TextType::class, [
                'label'=>"Titre du film",
                
                'attr'=>[
                    'placeholder' => 'Titre du film',
                    "class"=>"form__input"                
            ]])
            ->add('annee',NumberType::class, [
                    'label'=>"Année de sortie du film",
                    'attr'=>[
                        'placeholder' => 'Année de sortie du film',
                        "class"=>"form__input",
                        "min"=>"1900",
                        "max"=>"2050",
                    ],
            ])
            ->add('acteurs',TextType::class,[
                'label'=>'Liste des acteurs principaux','attr'=>[
                    'placeholder' => 'Liste des acteurs principaux',
                    "class"=>"form__input"
]            ])
            ->add('synopsis',TextareaType::class,[
                'label'=>'Synopsis',
                'attr'=> [
                    'placeholder'=>'Synopsis',
                ],
            ])
            ->add('images',FileType::class,[
                'label'=>'Insérer une image',
                'attr'=> [
                    'placeholder'=>'Insérer une image',
                ],
            ])
            ->add('duree',NumberType::class,[
                                'label'=>'Insérer une durée',
                'attr'=> [
                    'placeholder'=>'Insérer une durée',
                    
                ],
            ])
            ->add('save',SubmitType::class, ['label'=>"Suggérer ce film",'attr'=>["class"=>"btn_link btn_submit"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Films::class,
        ]);
    }
}
