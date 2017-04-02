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

    private $dataToValidate;

    public function __construct(array $dataToValidate)
    {
        $this->dataToValidate = $dataToValidate;
    }

    /**
     * @return bool
     * @throws ValidationException
     */
    public function validate()
    {
        if (empty($this->dataToValidate[Post::TITLE])) {
            throw new PostNeedsTitleException();
        }

        if (empty($this->dataToValidate[Post::CONTENT])) {
            throw new PostNeedsContentException();
        }

        return true;
    }
}