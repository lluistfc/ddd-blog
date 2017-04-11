<?php
namespace Blog\Domain\Validators\Post;

use Blog\Domain\Entity\Post;
use Blog\Domain\Exceptions\Validation\InvalidArgumentException;
use Blog\Domain\Exceptions\Validation\PostMustBeCreatedByAnAuthorException;
use Blog\Domain\Exceptions\Validation\PostNeedsContentException;
use Blog\Domain\Exceptions\Validation\PostNeedsStateException;
use Blog\Domain\Exceptions\Validation\PostNeedsTitleException;
use Blog\Domain\Validators\SingleRules\VerifyValueInAssociativeAndNormalArray;
use Blog\Domain\Validators\ValidatorInterface;

/**
 * Class CreatePostService
 * @package Blog\Domain\Validators\Post
 */
class CreatePostValidator implements ValidatorInterface
{
    use VerifyValueInAssociativeAndNormalArray;

    const EXPECTED_TITLE_INDEX = 0;
    const EXPECTED_CONTENT_INDEX = 1;
    const EXPECTED_STATE_INDEX = 2;
    const EXPECTED_AUTHOR_INDEX = 3;
    const EXPECTED_PUBLISHED_INDEX = 4;
    const EXPECTED_PUBLISHEDAT_INDEX = 5;

    /**
     * @param $valuesToValidate
     * @throws InvalidArgumentException
     * @throws PostMustBeCreatedByAnAuthorException
     * @throws PostNeedsContentException
     * @throws PostNeedsStateException
     * @throws PostNeedsTitleException
     */
    public function validate($valuesToValidate)
    {
        if (!is_array($valuesToValidate)) {
            throw new InvalidArgumentException();
        }

        $postValues = [
            Post::TITLE => $this->getValue($valuesToValidate, Post::TITLE, self::EXPECTED_TITLE_INDEX),
            Post::CONTENT => $this->getValue($valuesToValidate, Post::CONTENT, self::EXPECTED_CONTENT_INDEX),
            Post::STATE => $this->getValue($valuesToValidate, Post::STATE, self::EXPECTED_STATE_INDEX),
            Post::AUTHOR => $this->getValue($valuesToValidate, Post::AUTHOR, self::EXPECTED_AUTHOR_INDEX),
            Post::PUBLISHED => $this->getValue($valuesToValidate, Post::PUBLISHED, self::EXPECTED_PUBLISHED_INDEX),
            Post::PUBLISHEDAT => $this->getValue($valuesToValidate, Post::PUBLISHEDAT, self::EXPECTED_PUBLISHEDAT_INDEX)
        ];

        if (empty($postValues[Post::TITLE])) {
            throw new PostNeedsTitleException();
        }

        if (empty($postValues[Post::CONTENT])) {
            throw new PostNeedsContentException();
        }

        if (empty($postValues[Post::STATE])) {
            throw new PostNeedsStateException();
        }

        if (empty($postValues[Post::AUTHOR])) {
            throw new PostMustBeCreatedByAnAuthorException();
        }

        if (!is_bool($postValues[Post::PUBLISHED])) {
            throw new InvalidArgumentException();
        }

        if (!$postValues[Post::PUBLISHEDAT] instanceof \DateTime) {
            throw new InvalidArgumentException();
        }
    }
}