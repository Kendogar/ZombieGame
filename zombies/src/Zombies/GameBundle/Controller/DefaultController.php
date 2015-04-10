<?php

namespace Zombies\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Zombies\GameBundle\Utils;


class DefaultController extends Controller
{

    public function indexAction()
    {
        return $this->render('ZombiesGameBundle:Default:index.html.twig');
    }

    public function createAction($coordinates, $type){

        $place = $this->get('place.manager')->createPlace($type);
        $coordinatesArray = $this->get('coordinates.manager')->createCoordinates($coordinates);
        $place = $this->get('place.manager')->assignCoordinates($place,$coordinatesArray);
        $resources = $this->get('resources.manager')->createResources();
        $place = $this->get('place.manager')->assignResources($place, $resources);
        $inhabitants = $this->get('inhabitants.manager')->createInhabitants($type);
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
        $places = $em->getRepository('ZombiesGameBundle:Place')->findById($id);
        $resources = $em->getRepository('ZombiesGameBundle:Resources')->findByPlace_id($id);
        $coordinates = $em->getRepository('ZombiesGameBundle:Inhabitants')->findByPlace_id($id);
        $inhabitants = $em->getRepository('ZombiesGameBundle:Coordinates')->findByPlace_id($id);



        foreach($places as $place){
            $em->remove($place);
        }
        foreach($resources as $resource){
            $em->remove($resource);
        }
        foreach($inhabitants as $inhabitant){
            $em->remove($inhabitant);
        }
        foreach($coordinates as $coordinate){
            $em->remove($coordinate);
        }
        $em->flush();

        return new Response('Data with ID: '.$id. "deleted.");
    }
}
