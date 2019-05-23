<?php

namespace App\Controller;

use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{

    /**
     * @Route("/logout", name="logout")
     */
    public function logout(Request $request)
    {
        $request->getSession()->set('woLoginMicrosite', null);
        return $this->redirectToRoute('login');
    }

    /**
     * @Route("/", name="login")
     */
    public function index(Request $request, UserService $userService)
    {
        $username = isset($_POST['username']) ? $_POST['username'] : 0;
        $passwd = isset($_POST['passwd']) ? $_POST['passwd'] : 0;
        $sendForm = isset($_POST['login']) ? true : false;
        $errMsg = null;
        $loggedIn = false;

        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
        $qb->select('s');
        $qb->from('App:Usuario', 'u');


        if ($username !== 0 && $passwd !== 0) {
            $user = $this->getDoctrine()->getManager()->createQueryBuilder()->
            select('u.id')->from('App:Usuario', 'u')
                ->where('u.nombre = :username')
                ->andWhere('u.password = :passwd')
                ->setParameter('username', $username)
                ->setParameter('passwd', md5($passwd))
                ->orderBy('fecha_inicio DESC')
                ->getQuery()->getSingleResult();
            $loginOK = count($user) > 0;
            if (!$loginOK) {
                $errMsg = "Credenciales inválidas.";
            } else {
                $request->getSession()->set('woLoginMicrosite', $user['id']);
                $dbUser = $this->getDoctrine()->getManager()->getRepository('App:Usuario')
                    ->find(1);;
                $dbUser->setAplicacion(true);
                $dbUser->setActivo(true);
                $this->getDoctrine()->getManager()->persist($dbUser);
                $this->getDoctrine()->getManager()->flush();
                $loggedIn = true;
            }
        } else if ($sendForm) {
            $errMsg = "Debes introducir unas credenciales de acceso.";
        }

        if ($userService->isLoggedIn()) {
            $loggedIn = true;
        }

        if ($loggedIn) {
            return $this->redirectToRoute('services');
        }


        return $this->render('login/index.html.twig', [
            'errMsg' => $errMsg
        ]);
    }
}
