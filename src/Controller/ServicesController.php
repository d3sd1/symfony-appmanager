<?php

namespace App\Controller;

use App\Service\ServicesService;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ServicesController extends AbstractController
{
    /**
     * @Route("/services", name="services")
     */
    public function index(UserService $userService)
    {
        if (!$userService->isLoggedIn()) {
            return $this->redirectToRoute('login');
        }


        // Si solo queremos los abiertos, sin cerrados ni facturados
        //$qb->where("s.id_servicio_estado < 5");
        $dbDelegaciones = $this->getDoctrine()->getManager()->getRepository('App:Delegacion')
            ->findAll();
        $dbDepartamentos = $this->getDoctrine()->getManager()->getRepository('App:Departamento')
            ->findAll();
        $dbEmpresas = $this->getDoctrine()->getManager()->getRepository('App:Empresa')
            ->findAll();
        /*
         * Los departamentos y delegaciones se pueden sacar del campo id_departamento e id_delegacion (ty los nombres de las tablas coincidentes) en la tabla "servicio_categoria" que está relacionada a "servicio" por el "id_servicio".
         */

        return $this->render('services/index.html.twig', [
            'delegaciones' => $dbDelegaciones,
            'departamentos' => $dbDepartamentos,
            'empresas' => $dbEmpresas,
            'currentUser' => $userService->getSessionUser()->getNombreCompleto(),
            'usuario' => $userService->getSessionUser(),
        ]);
    }

    /**
     * @Route("/service/{id}", name="service")
     */
    public function servicio(UserService $userService, $id)
    {
        if (!$userService->isLoggedIn()) {
            return $this->redirectToRoute('login');
        }

        $servicio = $this->getDoctrine()->getManager()->createQueryBuilder()->
        select('s')->from('App:Servicio', 's')
            ->where('s.id = :id')
            ->setParameter('id', $id)
            ->getQuery()->getSingleResult();


        /* Calculate day */
        $dayInit = $servicio->getFechaInicio();
        $dayEnd = $servicio->getFechaFin();
        $dayStr = "Días no acordados";
        if ($dayInit != null && $dayEnd != null) {
            $totalDays = $dayEnd->diff($dayInit)->format("%a");
            $currentDay = (new DateTime())->diff($dayInit)->format("%a");
            $dayStr = "Día $currentDay/$totalDays";
        }

        /* Estado servicio */
        $estado = $servicio->getIdServicioEstado();
        switch ($estado) {
            case 1:
                $estadoStr = "Pedido";
                break;
            case 2:
                $estadoStr = "Confirmado";
                break;
            case 3:
                $estadoStr = "Cerrado";
                break;
            case 4:
                $estadoStr = "Facturado";
                break;
            case 5:
                $estadoStr = "Anulado";
                break;
            case 0:
                $estadoStr = "Sin estado";
                break;
            default:
                $estadoStr = "Estado no identificado: " . $estado;
        }

        /* Nombre del departamento */
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT DISTINCT id_departamento, id_delegacion FROM servicio_categoria WHERE id_servicio = :id");
        $statement->bindValue('id', $servicio->getId());
        $statement->execute();
        $results = $statement->fetchAll();
        $dptoStr = "Sin departamento";
        $deleStr = "Sin delegación";
        if (count($results) > 0) {
            $dptoStr = "";
            $deleStr = "";
            $i = 0;
            foreach ($results as $result) {
                $dptoStr .= ($i > 0 ? "," : "") . $this->getDoctrine()->getManager()->
                    createQueryBuilder()->select('s')->
                    from('App:Departamento', 's')
                        ->where('s.id = :id')
                        ->setParameter('id', $result['id_departamento'])->getQuery()->getSingleResult()->getNombrePublico();
                $deleStr .= ($i > 0 ? "," : "") . $this->getDoctrine()->getManager()->
                    createQueryBuilder()->select('s')->
                    from('App:Delegacion', 's')
                        ->where('s.id = :id')
                        ->setParameter('id', $result['id_delegacion'])->getQuery()->getSingleResult()->getNombre();
                $i++;
            }
        }

        /* Presupuesto */
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT * FROM presupuesto WHERE id = :id");
        $statement->bindValue('id', $servicio->getIdPresupuesto());
        $statement->execute();
        $results = $statement->fetchAll();

        $presupuestoKey = "Sin presupuesto";
        if (count($results) > 0) {
            $presupuestoKey = $results[0]['numero'];
        }

        /* Evento del servicio */
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT * FROM campanya WHERE id = :id");
        $statement->bindValue('id', $servicio->getIdCampanya());
        $statement->execute();
        $results = $statement->fetchAll();


        $eventoStr = "Sin evento asignado";
        if (count($results) > 0) {
            $eventoStr = $results[0]['numero'];
        }

        /* Estado del servicio */
        $estado = $servicio->getIdServicioEstado();
        switch ($estado) {
            case 1:
                $estadoStr = "Pedido";
                break;
            case 2:
                $estadoStr = "Confirmado";
                break;
            case 3:
                $estadoStr = "Cerrado";
                break;
            case 4:
                $estadoStr = "Facturado";
                break;
            case 5:
                $estadoStr = "Anulado";
                break;
            case 0:
                $estadoStr = "Sin estado";
                break;
            default:
                $estadoStr = "Estado no identificado: " . $estado;
        }


        /* Personal del servicio */
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT u.* FROM rel_servicio_usuario rsu JOIN usuario u ON u.id=rsu.id_usuario WHERE rsu.id_servicio = :id");
        $statement->bindValue('id', $servicio->getId());
        $statement->execute();
        $results = $statement->fetchAll();

        $eventoStr = "Sin evento asignado";
        if (count($results) > 0) {
            $eventoStr = $results[0]['numero'];
        }


        $servicioDepurado = array(
            'codigo' => $servicio->getNumero(),
            1 => $this->getDoctrine()->getManager()->
            createQueryBuilder()->select('s')->
            from('App:Empresa', 's')
                ->where('s.id = :id')
                ->setParameter('id', $servicio->getIdEmpresa())->getQuery()->getSingleResult()->getNombre(),
            2 => $servicio->getNombre(),
            3 => $deleStr,
            4 => $dptoStr,
            5 => $estadoStr,
            6 => "TODO_PAX",
            'fecha' => $dayStr,
            8 => $servicio->getId(),
            'presupuesto' => $presupuestoKey,
            'evento' => $eventoStr,
            'estado' => $estadoStr,
        );


        return $this->render('services/single.html.twig', [
            'servicio' => $servicioDepurado,
            'currentUser' => $userService->getSessionUser()->getNombreCompleto(),
        ]);
    }

    /**
     * @Route("/services_fetch_table", name="servicefetcher")
     */
    public function serviciofetcher(UserService $userService, ServicesService $serviceData)
    {
        if (!$userService->isLoggedIn()) {
            return $this->redirectToRoute('login');
        }

        $startIdx = isset($_POST["start"]) ? intval($_POST["start"]) : 0;
        $length = isset($_POST["length"]) ? intval($_POST["length"]) : 10;
        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
        $qb->select('s');
        $qb->from('App:Servicio', 's');

        /*
         * campo: id_servicio_estado --> tabla servicio_estado
         *   el �nico valor que no nos valdr�a es el 5 = anulado pero dependiendo de lo que queramos mostrar si son solo los abiertos ser�a to do lo que sea < 3 (cerrado, facturado, anulado quedar�an fuera)
         *   si necesitamos tener las fechas de referencia de cuando se realiza el servicio esto se sacar�a haciendo el join servicio_categoria on servicio_categoria.id_servicio = servicio.id  donde el id_persona_servicio_estado sea menor que 9 que es el anulado y en base al campo "fecha".
         *
            hay otras tablas relacionadas sin foreign key declarada como "id_presupuesto" o "id_cliente" que no s� ser�an necesarias.
         */
        $qb->setFirstResult($startIdx); // solo para prevenir bytes exhausted
        $qb->setMaxResults($length); // solo para prevenir bytes exhausted
        $qb->where("s.id_servicio_estado != 5"); //quitamos los anulados

        $servicios = $qb->getQuery()->getArrayResult();


        $serviciosDepurados = array();
        //var_dump($servicios);die();
        $servicioDepurados[] = array();

        foreach ($servicios as $servicio) {
            $servicioDepurados[] = $serviceData->getServiceData($servicio['id']);
        }

        return new JsonResponse(array(
            "draw" => isset($_POST["draw"]) ? intval($_POST["draw"]) : 0,
            "recordsTotal" => $this->getDoctrine()->getManager()->createQueryBuilder()->select('count(s.id)')->from('App:Servicio', 's')->getQuery()->getSingleScalarResult(),
            "recordsFiltered" => $this->getDoctrine()->getManager()->createQueryBuilder()->select('count(s.id)')->from('App:Servicio', 's')->getQuery()->getSingleScalarResult() / $length,
            "data" => $serviciosDepurados
        ));
    }
}
