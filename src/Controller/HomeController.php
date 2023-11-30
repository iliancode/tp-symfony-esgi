<?php


namespace App\Controller;

use App\Entity\Auteur;
use App\Entity\Categorie;
use App\Entity\Personne;
use App\Form\PersonneType;
use App\Form\Type\AuteurType;
use App\Form\Type\CategorieType;
use App\Repository\AuteurRepository;
use App\Repository\CategorieRepository;
use App\Repository\PersonneRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class HomeController extends AbstractController
{


    #[Route('/', name: 'app_home_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->redirectToRoute('app_livre_index', [], Response::HTTP_SEE_OTHER);
    }




}
