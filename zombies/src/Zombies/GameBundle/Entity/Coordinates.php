<?php

namespace Zombies\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Coordinates
 */
class Coordinates
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var float
     */
    private $xCoordinate;

    /**
     * @var float
     */
    private $yCoordinate;

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
     * Set xCoordinate
     *
     * @param float $xCoordinate
     * @return Coordinates
     */
    public function setXCoordinate($xCoordinate)
    {
        $this->xCoordinate = $xCoordinate;

        return $this;
    }

    /**
     * Get xCoordinate
     *
     * @return float 
     */
    public function getXCoordinate()
    {
        return $this->xCoordinate;
    }

    /**
     * Set yCoordinate
     *
     * @param float $yCoordinate
     * @return Coordinates
     */
    public function setYCoordinate($yCoordinate)
    {
        $this->yCoordinate = $yCoordinate;

        return $this;
    }

    /**
     * Get yCoordinate
     *
     * @return float 
     */
    public function getYCoordinate()
    {
        return $this->yCoordinate;
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
