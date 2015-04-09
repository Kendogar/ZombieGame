<?php

namespace Zombies\GameBundle\Utils;

use Zombies\GameBundle\Entity\Inhabitants;
use Zombies\GameBundle\Utils;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class InhabitantsService{

    public function createInhabitants(){
        $inhabitants = new Inhabitants();
        $inhabitants->setMales(rand(0,3));
        $inhabitants->setFemales(rand(0,2));
        $inhabitants->setChildren(rand(0,2));

        return $inhabitants;
    }

    public function updatePlaceId($inhabitants, $id){
        $inhabitants->setPlaceId($id);

        return $inhabitants;
    }

}