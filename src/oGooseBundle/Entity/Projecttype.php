<?php

namespace oGooseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use oGooseBundle\Entity\Project;

/**
 * Projecttype
 *
 * @ORM\Table(name="projecttype")
 * @ORM\Entity(repositoryClass="oGooseBundle\Repository\ProjecttypeRepository")
 */
class Projecttype
{
    public function __construct() {
        $this->projects = new ArrayCollection();
    }
    
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @ORM\OneToMany(targetEntity="oGooseBundle\Entity\Project", mappedBy="projecttype")
     */
    protected $projects;

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
     * Set name
     *
     * @param string $name
     *
     * @return Projecttype
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
   
    /**
     * Add projects
     *
     * @param Project $project
     *
     * @return Author
     */
    public function addProjects(Project $project) {
        $this->projects[] = $project;

        return $this;
    }

    /**
     * Remove projects
     *
     * @param Project $project
     *
     * @return Author
     */
    public function removeProjects(Project $project) {
        $this->projects->removeElement($project);
    }

    /**
     * Get projects
     *
     * @return ArrayCollection
     */
    public function getProjects() {
        return $this->projects;
    }

}

