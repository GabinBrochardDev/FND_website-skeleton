<?php

namespace App\Controller;

use App\Entity\Movie;
use DateTime;
use DateTimeInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="app_index")
     */
    public function index(): Response
    {
        // return $this->render('index/index.html.twig', [
        //     'controller_name' => 'IndexController',
        // ]);
        return new Response('coucou');
    }

    /**
     * @Route(
     * "/addmovie",
     * name="add_movie"
     * )
     */
    public function addMovie( EntityManagerInterface $em ): Response
    {
        // Création d'un nouveau Movie
        $movieACreer = new Movie();
        $movieACreer->setTitle("BTS SSLAM 2");
        $movieACreer->setOverview("C'est un super film qui parle de super gens !");
        $movieACreer->setBackdropPath("testsetBackdropPath");
        $movieACreer->setAdult(false);
        $movieACreer->setOriginalLanguage("Fr");
        $movieACreer->setOriginalTitle("BTS SSLAM 2 - Promo 2021 - 2023");
        $movieACreer->setPopularity("100.00");
        $movieACreer->setPosterPath("setPosterPath");
        $date = date_create("2022-12-07");
        date_format($date, "AAAA-MM-JJ");
        $movieACreer->setReleaseDate( $date ); 
        $movieACreer->setVideo(false);
        $movieACreer->setVoteAverage(100.0);
        $movieACreer->setVoteCount(123);

        // Debug
        //var_dump($em);
        var_dump($movieACreer);
        // die;

        // Persiter en base
        $em->persist( $movieACreer );
        $em->flush();

        return new Response("OK");
    }
}
