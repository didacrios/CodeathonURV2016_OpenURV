<?php

namespace oGooseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use oGooseBundle\Entity\Project;

/**
 * Rating
 *
 * @ORM\Table(name="rating")
 * @ORM\Entity(repositoryClass="oGooseBundle\Repository\RatingRepository")
 */
class Rating
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="stars", type="integer")
     */
    private $stars;
    
    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="oGooseBundle\Entity\Project", inversedBy="ratings")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $project;
    
    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="oGooseBundle\Entity\Author", inversedBy="ratings")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $author;


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
	
	/**
     * Set project
     *
     * @param Project $project
     *
     * @return Project
     */
    public function setProject(Project $project)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }
	
    /**
     * Set author
     *
     * @param Author $author
     *
     * @return Author
     */
    public function setAuthor(Author $author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return Author
     */
    public function getAuthor()
    {
        return $this->author;
    }
}

