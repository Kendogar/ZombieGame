<?php

namespace Zombies\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inhabitants
 */
class Inhabitants
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $males;

    /**
     * @var integer
     */
    private $females;

    /**
     * @var integer
     */
    private $children;

    /**
     * @var integer
     */
    private $placeId;

    /**
     * @var integer
     */
    private $zombies;


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
     * Set males
     *
     * @param integer $males
     * @return Inhabitants
     */
    public function setMales($males)
    {
        $this->males = $males;

        return $this;
    }

    /**
     * Get males
     *
     * @return integer 
     */
    public function getMales()
    {
        return $this->males;
    }

    /**
     * Set females
     *
     * @param integer $females
     * @return Inhabitants
     */
    public function setFemales($females)
    {
        $this->females = $females;

        return $this;
    }

    /**
     * Get females
     *
     * @return integer 
     */
    public function getFemales()
    {
        return $this->females;
    }

    /**
     * Set children
     *
     * @param integer $children
     * @return Inhabitants
     */
    public function setChildren($children)
    {
        $this->children = $children;

        return $this;
    }

    /**
     * Get children
     *
     * @return integer 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set zombies
     *
     * @param integer $zombies
     * @return Inhabitants
     */
    public function setZombies($zombies)
    {
        $this->zombies = $zombies;

        return $this;
    }

    /**
     * Get zombies
     *
     * @return integer
     */
    public function getZombies()
    {
        return $this->zombies;
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
