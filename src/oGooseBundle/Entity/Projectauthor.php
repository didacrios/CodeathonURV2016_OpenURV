<?php

namespace oGooseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use oGooseBundle\Entity\Author;
use oGooseBundle\Entity\Project;

/**
 * Projectauthor
 *
 * @ORM\Table(name="projectauthor")
 * @ORM\Entity(repositoryClass="oGooseBundle\Repository\ProjectauthorRepository")
 */
class Projectauthor
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
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @var bool
     *
     * @ORM\Column(name="owner", type="boolean")
     */
    private $owner;
    
    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="oGooseBundle\Entity\Author", inversedBy="projectauthors")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $author;
    
    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="oGooseBundle\Entity\Project", inversedBy="projectauthors")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $project;

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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Projectauthor
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Projectauthor
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set owner
     *
     * @param boolean $owner
     *
     * @return Projectauthor
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return bool
     */
    public function getOwner()
    {
        return $this->owner;
    }
    
    /**
     * Set author
     *
     * @param Author $author
     *
     * @return Project
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
}

