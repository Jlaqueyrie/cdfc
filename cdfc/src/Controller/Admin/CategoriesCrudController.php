<?php

namespace App\Controller\Admin;

use App\Entity\Categories;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CategoriesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Categories::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom', "Nom de la cat�gorie d'article"),
        ];
    }
    */
}
