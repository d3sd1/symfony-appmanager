<?php

namespace App\Service;


use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;

class ServicesService
{
    /**
     * @var Container
     */
    private $container;
    private $em;

    /**
     * Constructor
     *
     * @param Container $container
     */
    public function __construct(Container $container, EntityManager $em)
    {
        $this->container = $container;
        $this->em = $em;
    }

    public function getServiceData($serviceId)
    {
        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
        $qb->select('s');
        $qb->from('App:Servicio', 's');
        $qb->where("s.id = :id");
        $qb->setParameter('id', $serviceId);

        $servicio = $qb->getQuery()->getResult();
        var_dump($servicio);
        die();
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

        $servicioDepurado = array(
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
        return $servicioDepurado;
    }
}