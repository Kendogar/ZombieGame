<?php

namespace Zombies\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resources
 */
class Resources
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $water;

    /**
     * @var integer
     */
    private $food;

    /**
     * @var integer
     */
    private $weapons;

    /**
     * @var integer
     */
    private $placeId;


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
     * Set water
     *
     * @param integer $water
     * @return Resources
     */
    public function setWater($water)
    {
        $this->water = $water;

        return $this;
    }

    /**
     * Get water
     *
     * @return integer 
     */
    public function getWater()
    {
        return $this->water;
    }

    /**
     * Set food
     *
     * @param integer $food
     * @return Resources
     */
    public function setFood($food)
    {
        $this->food = $food;

        return $this;
    }

    /**
     * Get food
     *
     * @return integer 
     */
    public function getFood()
    {
        return $this->food;
    }

    /**
     * Set weapons
     *
     * @param integer $weapons
     * @return Resources
     */
    public function setWeapons($weapons)
    {
        $this->weapons = $weapons;

        return $this;
    }

    /**
     * Get weapons
     *
     * @return integer 
     */
    public function getWeapons()
    {
        return $this->weapons;
    }

    /**
     * Set placeId
     *
     * @param integer $placeId
     * @return Coordinates
     */
    public function setPlaceId($placeId)
    {
        $this->placeId = $placeId;

        return $this;
    }

    /**
     * Get placeId
     *
     * @return integer
     */
    public function getPlaceId()
    {
        return $this->placeId;
    }
}
