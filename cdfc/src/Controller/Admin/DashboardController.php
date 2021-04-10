<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use App\Entity\Articles;
use App\Entity\Categories;
use App\Entity\Evenements;
use App\Entity\Reservations;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\ArticlesCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
         // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(ArticlesCrudController::class)->generateUrl());


    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Comité des fêtes cabreret');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Gestion des articles');
        yield MenuItem::linkToCrud('Articles', 'fa fa-newspaper-o', Articles::class);
        yield MenuItem::linkToCrud('Catégorie des articles', 'fa fa-bookmark', Categories::class);
        yield MenuItem::section('Gestion évènements');
        yield MenuItem::linkToCrud('Evènements', 'fa fa-calendar', Evenements::class);
        yield MenuItem::section('Gestion des réservations');
        yield MenuItem::linkToCrud('Réservations', 'fa fa-user-plus', Reservations::class);
        yield MenuItem::section('Gestion des utilisateurs');
        yield MenuItem::linkToCrud('Users', 'fa fa-users', Users::class);
    }
}
