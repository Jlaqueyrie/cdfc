<?php

namespace App\Controller\Admin;

use App\Entity\Evenements;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class EvenementsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Evenements::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre', "Titre de l'évènement"),
            TextEditorField::new('description', "Description de l'évènement"),
            TextField::new('imageCouvertureFichier', "Image de couverture pour l'évènement")
            ->setFormType(VichImageType::class),
            ImageField::new('imageCouverture')->setBasePath('/images/evenements')->onlyOnDetail(),
            DateField::new('dateDebut', "Date de début de l'évènement"),
            DateField::new('dateFin', "Date de fin de l'évènement"),
            BooleanField::new('isActif')
        ];
    }
}
