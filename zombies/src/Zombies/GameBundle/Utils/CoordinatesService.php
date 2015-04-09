<?php

namespace Zombies\GameBundle\Utils;

use Zombies\GameBundle\Entity\Coordinates;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;



class CoordinatesService{

    public function createCoordinates($coordinates){
        $arrayOfCoords = array();

        $coordTuples = explode("+", str_replace(")","",str_replace("(","",str_replace(" ","",str_replace("),(",")+(",$coordinates)))));


        foreach ($coordTuples as $tuple){
            $coordinate = new Coordinates();
            $temp = explode(",",$tuple);
            $coordinate->setXCoordinate($temp[0]);
            $coordinate->setYCoordinate($temp[1]);
            array_push($arrayOfCoords,$coordinate);
        }

        return $arrayOfCoords;

    }

    public function updatePlaceId($arrayOfCoords, $id){


        foreach ($arrayOfCoords as $coordinate){
            $coordinate->setPlaceId($id);
        }

        return $arrayOfCoords;
    }

}