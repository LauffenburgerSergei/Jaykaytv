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
 ->add('titre',TextType::class,$this->getConfiguration('Titre de série','Titre dde la série'))
            ->add('annee',NumberType::class,$this->getConfiguration('Année de sortie de la série','Année de sortie de la série',' "min"=>"1900",
                        "max"=>"2050",'))
            ->add('annee_fin',NumberType::class,$this->getConfiguration('Date de fin de la série','Année de fin de la série',' "min"=>"1900",
                        "max"=>"2050",'))
            ->add('acteurs', TextType::class, $this->getConfiguration('Liste des acteurs principaux','Liste des acteurs principaux'))
            ->add('synopsis',TextareaType::class,$this->getConfiguration('Synopsis','Synopsis'))
            ->add('images',FileType::class,$this->getConfiguration('Insérer une image','Insérer une image'))
            ->add('duree_episode',IntegerType::class,$this->getConfiguration('Insérer une durée moyenne des épisodes','Insérer une durée moyenne des épisodes','\'constraints\' => [
                    new File([
                        \'maxSize\' => \'1024k\',
                        \'mimeTypes\' => [
                            \'image/jpeg\',
                            \'image/svg+xml\',
                            \'image/webp\',
                        ],
                        \'mimeTypesMessage\' => \'Ce format de fichier n\'est pas accepté.\',
                    ]'))
            ->add('nombre_episode',IntegerType::class,$this->getConfiguration('Insérer une nombre d\'épisode moyen par saison','Insérer une nombre d\'épisode moyen par saison'))
            ->add('nombre_saison',NumberType::class,$this->getConfiguration('Insérer le nombre total de saison','Insérer le nombre total de saison'))
            ->add('save',SubmitType::class, ['label'=>"Suggérer cette série",'attr'=>["class"=>"btn_link btn_submit"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Series::class,
        ]);
    }
}
