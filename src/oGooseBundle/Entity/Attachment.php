<?php

namespace oGooseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use oGooseBundle\Entity\Author;
use oGooseBundle\Entity\Project;

/**
 * Attachment
 *
 * @ORM\Table(name="attachment")
 * @ORM\Entity(repositoryClass="oGooseBundle\Repository\AttachmentRepository")
 */
class Attachment
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
     * @ORM\Column(name="filename", type="string", length=255)
     */
    private $filename;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationdate", type="datetime")
     */
    private $creationdate;
    
    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="oGooseBundle\Entity\Author", inversedBy="attachments")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $author;
    
    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="oGooseBundle\Entity\Project", inversedBy="attachments")
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
     * Set filename
     *
     * @param string $filename
     *
     * @return Attachment
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set creationdate
     *
     * @param \DateTime $creationdate
     *
     * @return Attachment
     */
    public function setCreationdate($creationdate)
    {
        $this->creationdate = $creationdate;

        return $this;
    }

    /**
     * Get creationdate
     *
     * @return \DateTime
     */
    public function getCreationdate()
    {
        return $this->creationdate;
    }

    /**
     * Set author
     *
     * @param Author $author
     *
     * @return Attachment
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
     * @return Attachment
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

