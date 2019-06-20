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
        $qb->setFirstResult($startIdx); // solo para prevenir bytes exhausted
        $qb->setMaxResults($length); // solo para prevenir bytes exhausted
        $qb->where("s.id_servicio_estado < 9"); //quitamos los anulados

        $servicios = $qb->getQuery()->getArrayResult();


        $serviciosDepurados = array();

        foreach ($servicios as $servicio) {

            /* Estado servicio */
            $estado = $servicio['id_servicio_estado'];
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
            $statement->bindValue('id', $servicio['id']);
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


            /* PAX y fechas */
            $em = $this->getDoctrine()->getManager();
            $connection = $em->getConnection();
            $statement = $connection->prepare("select count(1) as pax , min(fecha) as fecha_inicio, max(fecha) as fecha_fin
from servicio_categoria
where id_servicio = :id and id_persona > 0 and id_persona_servicio_estado < 9 and separador = 0 and borrado = 0
group by id_servicio");
            $statement->bindValue('id', $servicio['id']);
            $statement->execute();
            $result = $statement->fetch();

            /* Calculate day */
            $dayInit = new \DateTime($result['fecha_inicio']);
            $dayEnd = new \Datetime($result['fecha_fin']);
            $dayStr = "Días no acordados";
            if ($dayInit != null && $dayEnd != null) {
                $totalDays = $dayEnd->diff($dayInit)->format("%a");
                $currentDay = (new \DateTime())->diff($dayInit)->format("%a");

                if ($currentDay > $totalDays) {
                    $dayStr = "Servicio finalizado";
                } else if ($currentDay == 0 && $totalDays == 0) {
                    $dayStr = "Servicio sin fechas";
                } else {
                    $dayStr = "Día $currentDay/$totalDays";
                }
            }


            $serviciosDepurados[] = array(
                0 => $servicio['numero'],
                1 => $this->getDoctrine()->getManager()->
                createQueryBuilder()->select('s')->
                from('App:Empresa', 's')
                    ->where('s.id = :id')
                    ->setParameter('id', $servicio['id_empresa'])->getQuery()->getSingleResult()->getNombre(),
                2 => $servicio['nombre'],
                3 => $deleStr,
                4 => $dptoStr,
                5 => $estadoStr,
                6 => (int)$result['pax'],

                7 => $dayStr,
                8 => $servicio['id'],
            );
        }

        return new JsonResponse(array(
            "draw" => isset($_POST["draw"]) ? intval($_POST["draw"]) : 0,
            "recordsTotal" => $this->getDoctrine()->getManager()->createQueryBuilder()->select('count(s.id)')->from('App:Servicio', 's')->getQuery()->getSingleScalarResult(),
            "recordsFiltered" => $this->getDoctrine()->getManager()->createQueryBuilder()->select('count(s.id)')->from('App:Servicio', 's')->getQuery()->getSingleScalarResult() / $length,
            "data" => $serviciosDepurados
        ));
    }


    private $em = null;

    public function getServiceData($serviceId)
    {

    }
}
