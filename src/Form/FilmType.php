<?php

namespace App\Form;

use App\Entity\Films;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Container4bziz0m\getCacheWarmerService;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class FilmType extends AbstractType
{
    /**
     * Permet d'avoir la configuration de base d'un champs
     *
     * @param string $label
     * @param string $placeholder
     * @return array
     */
    private function getConfiguration($label,$placeholder,$attrSupplementaires=null){
        return [
            'label'=>$label,
            'attr'=>['placeholder'=>$placeholder,$attrSupplementaires
            ]
        ];
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre',TextType::class,$this->getConfiguration('Titre du film','Titre du film'))
            ->add('annee',IntegerType::class,$this->getConfiguration('Année de sortie du film','Année de sortie du film',' "min"=>"1900",
                        "max"=>"2050",'))
            // ->add('acteurs',CollectionType::class,[
            //     //chaque entrée qui sera dans le tableau aura un champs ...
            //     'entry_type'=>TextType::class,'label'=>'Liste des acteurs principaux','attr'=>[
            //         'placeholder'=>'nianiania',]])
            ->add('acteurs', TextType::class, $this->getConfiguration('Liste des acteurs principaux','Liste des acteurs principaux'))
            ->add('synopsis',TextareaType::class,$this->getConfiguration('Synopsis','Synopsis'))
            ->add('images',FileType::class,$this->getConfiguration('Insérer une image','Insérer une image'))
            ->add('duree',IntegerType::class,$this->getConfiguration('Insérer une durée','Insérer une durée'))
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
