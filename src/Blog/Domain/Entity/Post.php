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

    public static function register(string $title, string $content, string $state, bool $published, \DateTime $publishedAt)
    {
        return new Post($title, $content, $state, $published, $publishedAt);
    }

    private function __construct(string $title, string $content, string $state, bool $published, \DateTime $publishedAt)
    {
        $this->setTitle($title);
        $this->setContent($content);
        $this->setState($state);
        $this->setPublished($published);
        $this->setPublishedAt($publishedAt);
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }

    /**
     * @param string $state
     */
    public function setState(string $state)
    {
        $this->state = $state;
    }

    /**
     * @param bool $published
     */
    public function setPublished(bool $published)
    {
        $this->published = $published;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @param \DateTime $publishedAt
     */
    public function setPublishedAt(\DateTime $publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
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
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return bool
     */
    public function isPublished()
    {
        return $this->published;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}