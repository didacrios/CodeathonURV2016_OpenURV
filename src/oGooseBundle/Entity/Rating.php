<?php

namespace oGooseBundle\Entity;

/**
 * Rating
 */
class Rating
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $stars;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set stars
     *
     * @param integer $stars
     *
     * @return Rating
     */
    public function setStars($stars)
    {
        $this->stars = $stars;

        return $this;
    }

    /**
     * Get stars
     *
     * @return int
     */
    public function getStars()
    {
        return $this->stars;
    }
}

