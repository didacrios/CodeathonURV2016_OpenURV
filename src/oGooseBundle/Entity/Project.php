<?php

namespace oGooseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use oGooseBundle\Entity\Author;
use oGooseBundle\Entity\Projecttype;
use oGooseBundle\Entity\Field;
use oGooseBundle\Entity\Rating;
use oGooseBundle\Entity\Comment;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="oGooseBundle\Repository\ProjectRepository")
 */
class Project {
    
    public function __construct() {
        $this->ratings = new ArrayCollection();
        $this->attachments = new ArrayCollection();
        $this->comments = new ArrayCollection();
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="abstract", type="text")
     */
    private $abstract;

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="string", length=255)
     */
    private $keywords;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publicationdate", type="datetime")
     */
    private $publicationdate;

    /**
     * @var bool
     *
     * @ORM\Column(name="allowcomments", type="boolean")
     */
    private $allowcomments;

    /**
     * @var bool
     *
     * @ORM\Column(name="open", type="boolean")
     */
    private $open;

    /**
     * @var bool
     *
     * @ORM\Column(name="finish", type="boolean")
     */
    private $finish;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="oGooseBundle\Entity\Author", inversedBy="projects")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $author;
    
    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="oGooseBundle\Entity\Projecttype", inversedBy="projects")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $projecttype;
    
    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="oGooseBundle\Entity\Field", inversedBy="projects")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $field;
    
    /**
    * @ORM\OneToMany(targetEntity="oGooseBundle\Entity\Rating", mappedBy="project")
    */
    protected $ratings;
    
    /**
    * @ORM\OneToMany(targetEntity="oGooseBundle\Entity\Attachment", mappedBy="project")
    */
    protected $attachments;
    
    /**
    * @ORM\OneToMany(targetEntity="oGooseBundle\Entity\Comment", mappedBy="project")
    */
    protected $comments;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Project
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set abstract
     *
     * @param string $abstract
     *
     * @return Project
     */
    public function setAbstract($abstract) {
        $this->abstract = $abstract;

        return $this;
    }

    /**
     * Get abstract
     *
     * @return string
     */
    public function getAbstract() {
        return $this->abstract;
    }

    /**
     * Set keywords
     *
     * @param string $keywords
     *
     * @return Project
     */
    public function setKeywords($keywords) {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get keywords
     *
     * @return string
     */
    public function getKeywords() {
        return $this->keywords;
    }

    /**
     * Set publicationdate
     *
     * @param \DateTime $publicationdate
     *
     * @return Project
     */
    public function setPublicationdate($publicationdate) {
        $this->publicationdate = $publicationdate;

        return $this;
    }

    /**
     * Get publicationdate
     *
     * @return \DateTime
     */
    public function getPublicationdate() {
        return $this->publicationdate;
    }

    /**
     * Set allowcomments
     *
     * @param boolean $allowcomments
     *
     * @return Project
     */
    public function setAllowcomments($allowcomments) {
        $this->allowcomments = $allowcomments;

        return $this;
    }

    /**
     * Get allowcomments
     *
     * @return bool
     */
    public function getAllowcomments() {
        return $this->allowcomments;
    }

    /**
     * Set open
     *
     * @param boolean $open
     *
     * @return Project
     */
    public function setOpen($open) {
        $this->open = $open;

        return $this;
    }

    /**
     * Get open
     *
     * @return bool
     */
    public function getOpen() {
        return $this->open;
    }

    /**
     * Set finish
     *
     * @param boolean $finish
     *
     * @return Project
     */
    public function setFinish($finish) {
        $this->finish = $finish;

        return $this;
    }

    /**
     * Get finish
     *
     * @return bool
     */
    public function getFinish() {
        return $this->finish;
    }

    /**
     * Set author
     *
     * @param Author $author
     *
     * @return Project
     */
    public function setAuthor(Author $author) {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return Author
     */
    public function getAuthor() {
        return $this->author;
    }
    
    /**
     * Set projecttype
     *
     * @param Projecttype $projecttype
     *
     * @return Project
     */
    public function setProjecttype(Projecttype $projecttype) {
        $this->projecttype = $projecttype;

        return $this;
    }

    /**
     * Get projecttype
     *
     * @return Projecttype
     */
    public function getProjecttype() {
        return $this->projecttype;
    }
    
    /**
     * Set field
     *
     * @param Field $field
     *
     * @return Project
     */
    public function setField(Field $field) {
        $this->field = $field;

        return $this;
    }

    /**
     * Get field
     *
     * @return Field
     */
    public function getField() {
        return $this->field;
    }
    
    
    /**
     * Add ratings
     *
     * @param Rating $rating
     *
     * @return Author
     */
    public function addRatings(Rating $rating) {
        $this->ratings[] = $rating;

        return $this;
    }

    /**
     * Remove ratings
     *
     * @param Rating $rating
     *
     * @return Author
     */
    public function removeRatings(Rating $rating) {
        $this->ratings->removeElement($rating);
    }

    /**
     * Get ratings
     *
     * @return ArrayCollection
     */
    public function getRatings() {
        return $this->ratings;
    }
    
    /**
     * Add attachments
     *
     * @param Attachment $attachment
     *
     * @return Author
     */
    public function addAttachments(Attachment $attachment) {
        $this->attachments[] = $attachment;

        return $this;
    }

    /**
     * Remove attachments
     *
     * @param Attachment $attachment
     *
     * @return Author
     */
    public function removeAttachments(Attachment $attachment) {
        $this->attachments->removeElement($attachment);
    }

    /**
     * Get attachments
     *
     * @return ArrayCollection
     */
    public function getAttachments() {
        return $this->attachments;
    }
    
    /**
     * Add comments
     *
     * @param Comment $comment
     *
     * @return Author
     */
    public function addComments(Comment $comment) {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param Comment $comment
     *
     * @return Author
     */
    public function removeComments(Comment $comment) {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return ArrayCollection
     */
    public function getComments() {
        return $this->comments;
    }
}
