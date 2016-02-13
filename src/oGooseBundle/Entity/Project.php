<?php

namespace oGooseBundle\Entity;

/**
 * Project
 */
class Project
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $abstract;

    /**
     * @var string
     */
    private $keywords;

    /**
     * @var \DateTime
     */
    private $publicationdate;

    /**
     * @var bool
     */
    private $allowcomments;

    /**
     * @var bool
     */
    private $open;


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
     * Set title
     *
     * @param string $title
     *
     * @return Project
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set abstract
     *
     * @param string $abstract
     *
     * @return Project
     */
    public function setAbstract($abstract)
    {
        $this->abstract = $abstract;

        return $this;
    }

    /**
     * Get abstract
     *
     * @return string
     */
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * Set keywords
     *
     * @param string $keywords
     *
     * @return Project
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get keywords
     *
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set publicationdate
     *
     * @param \DateTime $publicationdate
     *
     * @return Project
     */
    public function setPublicationdate($publicationdate)
    {
        $this->publicationdate = $publicationdate;

        return $this;
    }

    /**
     * Get publicationdate
     *
     * @return \DateTime
     */
    public function getPublicationdate()
    {
        return $this->publicationdate;
    }

    /**
     * Set allowcomments
     *
     * @param boolean $allowcomments
     *
     * @return Project
     */
    public function setAllowcomments($allowcomments)
    {
        $this->allowcomments = $allowcomments;

        return $this;
    }

    /**
     * Get allowcomments
     *
     * @return bool
     */
    public function getAllowcomments()
    {
        return $this->allowcomments;
    }

    /**
     * Set open
     *
     * @param boolean $open
     *
     * @return Project
     */
    public function setOpen($open)
    {
        $this->open = $open;

        return $this;
    }

    /**
     * Get open
     *
     * @return bool
     */
    public function getOpen()
    {
        return $this->open;
    }
}

