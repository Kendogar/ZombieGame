<?php

namespace Zombies\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Zombies\GameBundle\Utils;

/*use Zombies\GameBundle\Entity\Place;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;*/


class DefaultController extends Controller
{

    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('ZombiesGameBundle:Place');
        $allPlaces = $repository->findAll();


        $allCoordinates = array();
        foreach ($allPlaces as $place){
            $placeCoordinates = $this->get('place.manager')->extractCoordinates($place);
            array_push($allCoordinates, $placeCoordinates);
        }

        $jarray = json_encode($allCoordinates);
        print "<pre>";
        print_r($jarray);
        print "</pre>";
        //  $jarray = str_replace('"', "'", $jarray);



        return $this->render('ZombiesGameBundle:Default:index.html.twig');
    }

    public function createAction($coordinates){

        $place = $this->get('place.manager')->createPlace();
        $coordinatesArray = $this->get('coordinates.manager')->createCoordinates($coordinates);
        $place = $this->get('place.manager')->assignCoordinates($place,$coordinatesArray);
        $resources = $this->get('resources.manager')->createResources();
        $place = $this->get('place.manager')->assignResources($place, $resources);
        $inhabitants = $this->get('inhabitants.manager')->createInhabitants();
        $place = $this->get('place.manager')->assignInhabitants($place, $inhabitants);

        $em = $this->getDoctrine()->getManager();
        $em->persist($place);
        $em->flush();
        $em->refresh($place);

        $id = $place->getId();

        $coordinatesArray = $this->get('coordinates.manager')->updatePlaceId($coordinatesArray, $id);
        foreach ($coordinatesArray as $coordinate){
            $em->persist($coordinate);
            $em->flush();
        }
        $resources = $place->getResources();
        $updatedResources = $this->get('resources.manager')->updatePlaceId($resources, $id);
        $em->persist($updatedResources);
        $em->flush();

        $inhabitants = $place->getInhabitants();
        $updatedInhabitants = $this->get('inhabitants.manager')->updatePlaceId($inhabitants, $id);
        $em->persist($updatedInhabitants);
        $em->flush();


        return new Response('Created Place ID: '.$id);
    }

    public function showAction($id){
        $place = $this->getDoctrine()->getRepository('ZombiesGameBundle:Place')->find($id);

        if(!$place){
            Return new Response('Place with ID: '.$id.' not found.');
        }
        else{
            return new Response('Cordinates of ID: '.$id.' are: '. implode("/",$place->getCoordinates()));
        }
    }

    public function updateAction($id){
        $em = $this->getDoctrine()->getManager();
        $place = $em->getRepository('ZombiesGameBundle:Place')->find($id);

        if (!$place) {
            Return new Response('Place with ID: '.$id.' not found.');
        }


        // insert code to change Place

        $em->flush();

        return $this->redirectToRoute('/');
    }

    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();
        $place = $em->getRepository('ZombiesGameBundle:Place')->find($id);

        if (!$place) {
            Return new Response('Place with ID: '.$id.' not found.');
        }

        $em->remove($place);
        $em->flush();
    }
}
