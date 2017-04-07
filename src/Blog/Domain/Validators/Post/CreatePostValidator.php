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
     * @param $postValues
     * @return bool
     * @throws PostNeedsContentException
     * @throws PostNeedsTitleException
     */
    public function validate($postValues)
    {
        if (empty($postValues[Post::TITLE])) {
            throw new PostNeedsTitleException();
        }

        if (empty($postValues[Post::CONTENT])) {
            throw new PostNeedsContentException();
        }

        return true;
    }
}