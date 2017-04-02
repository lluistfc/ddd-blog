<?php

namespace Blog\Domain\Entity;

/**
 * Class Post
 * @package Blog\Domain\Entity
 */
class Post implements EntityInterface
{
    const ID            = 'id';
    const TITLE         = 'title';
    const CONTENT       = 'content';
    const STATE         = 'state';
    const PUBLISHED     = 'published';
    const CREATED_AT    = 'createdAt';
    const PUBLISHED_AT  = 'publishedAt';
    const UPDATED_AT    = 'updatedAt';

    /**
     * @access private
     * @var integer
     */
    private $id;

    /**
     * @access private
     * @var string
     */
    private $title;

    /**
     * @access private
     * @var string
     */
    private $content;

    /**
     * @access private
     * @var string
     */
    private $state;

    /**
     * @access private
     * @var boolean
     */
    private $published;

    /**
     * @access private
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @access private
     * @var \DateTime
     */
    private $publishedAt;

    /**
     * @access private
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState(string $state)
    {
        $this->state = $state;
    }

    /**
     * @return bool
     */
    public function isPublished()
    {
        return $this->published;
    }

    /**
     * @param bool $published
     */
    public function setPublished(bool $published)
    {
        $this->published = $published;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * @param \DateTime $publishedAt
     */
    public function setPublishedAt(\DateTime $publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
}