<?php

namespace Blog\Domain\Entity;

use Blog\Domain\Exceptions\Validation\InvalidArgumentException;
use Blog\Domain\Validators\Post\CreatePostValidator;

/**
 * Class Post
 * @package Blog\Domain\Entity
 */
class Post extends Entity
{
    const TITLE         = 'title';
    const CONTENT       = 'content';
    const STATE         = 'state';
    const PUBLISHED     = 'published';
    const PUBLISHED_AT  = 'publishedAt';

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
    private $publishedAt;

    public static function publish($id, string $title, string $content, string $state, bool $published, \DateTime $publishedAt)
    {
        (new CreatePostValidator())->validate(func_get_args());
        return new Post($id, $title, $content, $state, $published, $publishedAt);
    }

    protected function __construct($id, string $title, string $content, string $state, bool $published, \DateTime $publishedAt)
    {
        $this->setId($id);
        $this->setTitle($title);
        $this->setContent($content);
        $this->setState($state);
        $this->setPublished($published);
        $this->setPublishedAt($publishedAt);

        parent::__construct();
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    private function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    private function setContent(string $content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    private function setState(string $state)
    {
        $this->state = $state;
    }

    /**
     * @return bool
     */
    public function isPublished(): bool
    {
        return $this->published;
    }

    /**
     * @param bool $published
     */
    private function setPublished(bool $published)
    {
        $this->published = $published;
    }

    /**
     * @param string $format
     * @return string
     */
    public function getPublishedAt($format = 'Y-m-d'): string
    {
        return $this->publishedAt->format($format);
    }

    /**
     * @param \DateTime $publishedAt
     */
    private function setPublishedAt(\DateTime $publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }
}