<?php

namespace App\Form;

use App\Entity\Series;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
// use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class SeriesType extends AbstractType
{
    /**
     * Permet d'avoir la configuration d'un champs
     *
     * @param string $label
     * @param string $placeholder
     * @return array
     */
    public function getConfiguration($label, $placeholder,$attrSupplementaires=null)
    {
         return [
            'label'=>$label,
            'attr'=>['placeholder'=>$placeholder,$attrSupplementaires
            ]
        ];
    }


    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('annee')
            ->add('genre_1')
            ->add('genre_2')
            ->add('genre_3')
            ->add('acteurs')
            ->add('synopsis')
            ->add('images')
            ->add('duree_episode')
            ->add('nombre_episode')
            ->add('nombre_saison')
            ->add('annee_fin')
            ->add('video')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Series::class,
        ]);
    }
}
