<?php

namespace App\Controller;

use App\Entity\Examenes;
use App\Repository\ExamenesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PrincipalController extends AbstractController
{
    
    /**
     * @Route("/api/principal", name="principal", methods={"GET","POST"}, options={"expose"=true})
     */
    public function index( Request $request )
    {
        $data = json_decode( $request->getContent());
        $exa = new Examenes();
        $exa->setHtml($data->html);
        $exa->setIp($this->getIp());
        $exa->setPuntaje(floatval($data->puntaje));
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($exa);
        $entityManager->flush();

        //var_dump($exa); die;
        
        $response = new JsonResponse(array(
            'exito'=>1,
            'mensaje'=>'gracias maitro :")'
        ));
       
        return $response;
    }

    /**
     * @Route("/home", name="home", methods={"GET","POST"})
     */
    public function home( ExamenesRepository $examenRepo )
    {
        $htmls = $examenRepo->findAll();

        return $this->render('home/show.html.twig', [
            'examenes'=>$htmls
        ]); 
    }

    public function getIp(){
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}


