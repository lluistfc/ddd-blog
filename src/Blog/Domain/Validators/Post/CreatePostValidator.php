<?php
namespace Blog\Domain\Validators\Post;

use Blog\Domain\Entity\Post;
use Blog\Domain\Exceptions\Validation\PostNeedsContentException;
use Blog\Domain\Exceptions\Validation\PostNeedsTitleException;
use Blog\Domain\Exceptions\Validation\ValidationException;
use Blog\Domain\Validators\ValidatorInterface;

/**
 * Class CreatePostService
 * @package Blog\Domain\Validators\Post
 */
class CreatePostValidator implements ValidatorInterface
{
    /**
     * @var Post
     */
    private $newPostToValidate;

    public function __construct(Post $newPostToValidate)
    {
        $this->newPostToValidate = $newPostToValidate;
    }

    /**
     * @return bool
     * @throws ValidationException
     */
    public function validate()
    {
        if (empty($this->newPostToValidate->getTitle())) {
            throw new PostNeedsTitleException();
        }

        if (empty($this->newPostToValidate->getContent())) {
            throw new PostNeedsContentException();
        }

        return true;
    }
}