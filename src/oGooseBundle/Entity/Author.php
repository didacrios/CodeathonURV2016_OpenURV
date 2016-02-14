<?php

namespace oGooseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use oGooseBundle\Entity\Project;
use oGooseBundle\Entity\Rating;
use oGooseBundle\Entity\Comment;
use oGooseBundle\Entity\Projectauthor;

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
        $this->comments = new ArrayCollection();
        $this->projectauthors = new ArrayCollection();
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
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=255, nullable=true)
     */
    private $avatar;
    
    /**
     * @var string
     *
     * @ORM\Column(name="profile", type="string", length=255, nullable=true)
     */
    private $profile;
    
    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=true)
     */
    private $location;
    
    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", columnDefinition="enum('f', 'm')")
     */
    private $gender;

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
    * @ORM\OneToMany(targetEntity="oGooseBundle\Entity\Comment", mappedBy="author")
    */
    protected $comments;
    
    /**
    * @ORM\OneToMany(targetEntity="oGooseBundle\Entity\Projectauthor", mappedBy="author")
    */
    protected $projectauthors;

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
     * Set avatar
     *
     * @param string $avatar
     *
     * @return Author
     */
    public function setAvatar($avatar) {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar() {
        return $this->avatar;
    }
    
    /**
     * Set profile
     *
     * @param string $profile
     *
     * @return Author
     */
    public function setProfile($profile) {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Get profile
     *
     * @return string
     */
    public function getProfile() {
        return $this->profile;
    }
    
    /**
     * Set location
     *
     * @param string $location
     *
     * @return Author
     */
    public function setLocation($location) {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation() {
        return $this->location;
    }
       
    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return Author
     */
    public function setGender($gender) {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender() {
        return $this->gender;
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

    /**
     * Add projectauthors
     *
     * @param Projectauthor $projectauthor
     *
     * @return Author
     */
    public function addProjectauthors(Projectauthor $projectauthor) {
        $this->projectauthors[] = $projectauthor;

        return $this;
    }

    /**
     * Remove projectauthors
     *
     * @param Projectauthor $projectauthor
     *
     * @return Author
     */
    public function removeProjectauthors(Projectauthor $projectauthor) {
        $this->projectauthors->removeElement($projectauthor);
    }

    /**
     * Get projectauthors
     *
     * @return ArrayCollection
     */
    public function getProjectauthors() {
        return $this->projectauthors;
    }
}
