<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UsersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Users::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('prenom', 'Prénom'),
            TextField::new('nom', 'Nom'),
            TelephoneField::new('telephone', 'Numéro de téléphone'),
            EmailField::new('email', 'Adresse email'),
            TextField::new('password', "Mot de passe")
        ];
    }
}
