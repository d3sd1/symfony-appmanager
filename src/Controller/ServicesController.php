<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ServicesController extends AbstractController
{
    /**
     * @Route("/", name="services")
     */
    public function index()
    {
        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
        $qb->select('s');
        $qb->from('App:Servicio', 's');

        $startIndex = isset($_GET['s']) ? $_GET['s'] : 0;
        $resultsPerPage = isset($_GET['r']) ? $_GET['r'] : 0;
        $totalResults = $this->getDoctrine()->getManager()->createQueryBuilder()->select('COUNT(s)')->from('App:Servicio', 's')->getQuery()->getSingleScalarResult();

        if ($startIndex < 0) {
            $startIndex = 0;
        }
        if ($resultsPerPage == 0 || $resultsPerPage > 500) {
            $resultsPerPage = 10; // DEFAULT RESULTS PER PAGE
        }
        $currentPag = (int)($startIndex / $resultsPerPage);

        if ($startIndex >= $totalResults) {
            $startIndex = $totalResults - $resultsPerPage;
        }

        $endIndex = $startIndex + $resultsPerPage;
        if ($endIndex - $startIndex < $resultsPerPage) {
            $endIndex = $startIndex + $resultsPerPage;
        }
        if ($currentPag <= 0) {
            $currentPag = 1;
        }

        /*
         * campo: id_servicio_estado --> tabla servicio_estado
         *   el único valor que no nos valdría es el 5 = anulado pero dependiendo de lo que queramos mostrar si son solo los abiertos sería to do lo que sea < 3 (cerrado, facturado, anulado quedarían fuera)
         *   si necesitamos tener las fechas de referencia de cuando se realiza el servicio esto se sacaría haciendo el join servicio_categoria on servicio_categoria.id_servicio = servicio.id  donde el id_persona_servicio_estado sea menor que 9 que es el anulado y en base al campo "fecha".
         *
            hay otras tablas relacionadas sin foreign key declarada como "id_presupuesto" o "id_cliente" que no sé serían necesarias.
         */
        $qb->setFirstResult($startIndex);
        $qb->setMaxResults($resultsPerPage);
        $qb->where("s.id_servicio_estado != 5"); //quitamos los anulados

        // Si solo queremos los abiertos, sin cerrados ni facturados
        //$qb->where("s.id_servicio_estado < 5");

        $servicios = $qb->getQuery()->getArrayResult();
        return $this->render('services/index.html.twig', [
            'servicios' => $servicios,
            'resultsPerPage' => number_format($resultsPerPage, 0, ',', '.'),
            'totalResults' => number_format($totalResults, 0, ',', '.'),
            'startIndexResult' => $startIndex, // no formatear
            'endIndexResult' => $endIndex, // no formatear
            'currentPag' => $currentPag,
        ]);
    }
}
