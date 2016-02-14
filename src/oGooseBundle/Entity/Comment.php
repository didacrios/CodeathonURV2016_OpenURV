<?php

namespace oGooseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use oGooseBundle\Entity\Project;
use oGooseBundle\Entity\Author;

/**
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="oGooseBundle\Repository\CommentRepository")
 */
class Comment
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
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", columnDefinition="enum('review', 'comment')")
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationdate", type="datetime")
     */
    private $creationdate;
    
    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="oGooseBundle\Entity\Project", inversedBy="comments")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $project;
    
    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="oGooseBundle\Entity\Author", inversedBy="comments")
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
     * Set comment
     *
     * @param string $comment
     *
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Comment
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set creationdate
     *
     * @param \DateTime $creationdate
     *
     * @return Comment
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
     * Set project
     *
     * @param Project $project
     *
     * @return Comment
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
     * @return Comment
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

