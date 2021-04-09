<?php

namespace App\Controller\Admin;

use App\Entity\Articles;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ArticlesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Articles::class;
    }

    public function configureFields(string $pageName): iterable
    { 
         return [
            TextField::new('Titre'),
            TextEditorField::new('Contenu'),
            AssociationField::new('categorie'),
            TextField::new('imageCouvertureFichier')
            ->setFormType(VichImageType::class),
            ImageField::new('imageCouverture')->setBasePath('/images/articles')->onlyOnDetail()
         ];

        // if($pageName == Crud::PAGE_INDEX || $pageName == Crud::PAGE_DETAIL){
        //     $champs[] .= $imageArticle;
        // }
        // else{
        //     $champs[] .= $imageArticleFichier;
        // }
    }
}