<?php

namespace App\Controller;

use App\Entity\Cordenadas;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;


class PageController extends AbstractController
{

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function datos(ManagerRegistry $doctrine): Response{
        $repository = $doctrine->getRepository(Cordenadas::class);
        $cordenadas = $repository->findAll();
        $datos = [];
        foreach ($cordenadas as $cordenada){
            $data = [
                "id"=> $cordenada->getId(),
                "name" => $cordenada->getName(),
                "x" => $cordenada->getX(),
                "y" => $cordenada->getY(),
                "description" => $cordenada->getDescription()
            
            ];
            $datos[] = $data;
        }
        return $this->render('partials/_location.html.twig', [
            'cordenadas' => json_encode($datos)
        ]);
    }

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('page/index.html.twig', []);
    }

}

