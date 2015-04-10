<?php

namespace Zombies\GameBundle\Utils;

use Zombies\GameBundle\Entity\Place;
use Zombies\GameBundle\Utils;

class PlaceService{

    public function createPlace($type){
        $place = new Place();
        $place->setType($type);

        return $place;
    }

    public function assignCoordinates($place, $coordinate){
        $place->setCoordinates($coordinate);

        return $place;
    }

    public function assignResources($place, $resources){
        $place->setResources($resources);

        return $place;
    }

    public function assignInhabitants($place, $inhabitants){
        $place->setInhabitants($inhabitants);

        return $place;
    }

    public function extractCoordinates($place){
        $arrayOfCoordinates = $place->getCoordinates();
        $arrayOfStrings = array();
        foreach($arrayOfCoordinates as $coordinate){
            $tempString = $coordinate->getXCoordinate() . ', ' . $coordinate->getYCoordinate();
            array_push($arrayOfStrings, $tempString);
        }
        $first = $arrayOfCoordinates[0];
        $firstAsString = $first->getXCoordinate() . ', ' . $first->getYCoordinate();
        array_push($arrayOfStrings, $firstAsString);

        return $arrayOfStrings;
    }

}