<?php

namespace App\Form;

use App\Entity\Films;
use App\Entity\Genres;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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
            ->add('annee',TextType::class, [
                    'label'=>"Année de création du film",
                    
                    'attr'=>[
                        'placeholder' => 'Année de création du film',
                        "class"=>"form__input",
                        
                    ]
            ])
            ->add('acteurs',TextType::class,[
                'label'=>'Liste des acteurs principaux','attr'=>[
                    'placeholder' => 'Titre du film',
                    "class"=>"form__input"
]            ])
            ->add('synopsis')
            ->add('images')
            ->add('duree')
            ->add('save',SubmitType::class, ['label'=>"Suggérer un film",'attr'=>["class"=>"btn_link"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Films::class,
        ]);
    }
}
