<?php

namespace Zombies\GameBundle\Utils;

use Zombies\GameBundle\Entity\Resources;
use Zombies\GameBundle\Utils;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class ResourcesService{

    public function createResources(){
        $resources = new Resources();
        $resources->setFood(rand(40,250));
        $resources->setWater(rand(20,120));
        $resources->setWeapons(rand(0,50));

        return $resources;
    }

    public function updatePlaceId($resources, $id){
        $resources->setPlaceId($id);

        return $resources;
    }

}