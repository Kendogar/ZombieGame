<?php

namespace Zombies\GameBundle\Utils;

use Zombies\GameBundle\Entity\Inhabitants;
use Zombies\GameBundle\Utils;


class InhabitantsService{

    public function createInhabitants($type){
        $inhabitants = new Inhabitants();

        if ($type != "zombielair"){
            $inhabitants->setMales(rand(0,3));
            $inhabitants->setFemales(rand(0,2));
            $inhabitants->setChildren(rand(0,2));
            $inhabitants->setZombies(0);
        }
        else {
            $inhabitants->setZombies(rand(5, 40));
            $inhabitants->setMales(0);
            $inhabitants->setFemales(0);
            $inhabitants->setChildren(0);
        }



        return $inhabitants;
    }

    public function updatePlaceId($inhabitants, $id){
        $inhabitants->setPlaceId($id);

        return $inhabitants;
    }

}