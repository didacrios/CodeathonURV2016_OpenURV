<?php

namespace oGooseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use oGooseBundle\Entity\Project;

/**
 * Author
 *
 * @ORM\Table(name="author")
 * @ORM\Entity(repositoryClass="oGooseBundle\Repository\AuthorRepository")
 */
class Author {

    public function __construct() {
        $this->projects = new ArrayCollection();
        $this->attachments = new ArrayCollection();
        $this->ratings = new ArrayCollection();
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
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="orcid", type="string", length=255, nullable=true)
     */
    private $orcid;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="curriculum", type="text", nullable=true)
     */
    private $curriculum;

    /**
     * @ORM\OneToMany(targetEntity="oGooseBundle\Entity\Project", mappedBy="author")
     */
    protected $projects;
    
    /**
    * @ORM\OneToMany(targetEntity="oGooseBundle\Entity\Attachment", mappedBy="author")
    */
    protected $attachments;
    
    /**
    * @ORM\OneToMany(targetEntity="oGooseBundle\Entity\Rating", mappedBy="author")
    */
    protected $ratings;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Author
     */
    public function setFirstname($firstname) {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Author
     */
    public function setLastname($lastname) {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Author
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set orcid
     *
     * @param string $orcid
     *
     * @return Author
     */
    public function setOrcid($orcid) {
        $this->orcid = $orcid;

        return $this;
    }

    /**
     * Get orcid
     *
     * @return string
     */
    public function getOrcid() {
        return $this->orcid;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Author
     */
    public function setUrl($url) {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * Set curriculum
     *
     * @param string $curriculum
     *
     * @return Author
     */
    public function setCurriculum($curriculum) {
        $this->curriculum = $curriculum;

        return $this;
    }

    /**
     * Get curriculum
     *
     * @return string
     */
    public function getCurriculum() {
        return $this->curriculum;
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

}
