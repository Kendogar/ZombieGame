<?php

namespace Zombies\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Place
 */
class Place
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var array
     */
    private $coordinates;

    /**
     * @var \stdClass
     */
    private $inhabitants;

    /**
     * @var \stdClass
     */
    private $resources;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set coordinates
     *
     * @param array $coordinates
     * @return Place
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;

        return $this;
    }

    /**
     * Get coordinates
     *
     * @return array 
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * Set inhabitants
     *
     * @param \stdClass $inhabitants
     * @return Place
     */
    public function setInhabitants($inhabitants)
    {
        $this->inhabitants = $inhabitants;

        return $this;
    }

    /**
     * Get inhabitants
     *
     * @return \stdClass 
     */
    public function getInhabitants()
    {
        return $this->inhabitants;
    }

    /**
     * Set resources
     *
     * @param \stdClass $resources
     * @return Place
     */
    public function setResources($resources)
    {
        $this->resources = $resources;

        return $this;
    }

    /**
     * Get resources
     *
     * @return \stdClass
     */
    public function getResources()
    {
        return $this->resources;
    }
}
