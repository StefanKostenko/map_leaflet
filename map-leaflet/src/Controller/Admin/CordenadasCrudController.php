<?php

namespace App\Controller\Admin;

use App\Entity\Cordenadas;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CordenadasCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cordenadas::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
