<?php
namespace Blog\Domain\Validators\Post;

use Blog\Domain\Entity\Post;
use Blog\Domain\Exceptions\Validation\InvalidArgumentException;
use Blog\Domain\Exceptions\Validation\MissingIdentifierException;
use Blog\Domain\Exceptions\Validation\PostNeedsContentException;
use Blog\Domain\Exceptions\Validation\PostNeedsStateException;
use Blog\Domain\Exceptions\Validation\PostNeedsTitleException;
use Blog\Domain\Validators\ValidatorInterface;

/**
 * Class CreatePostService
 * @package Blog\Domain\Validators\Post
 */
class CreatePostValidator implements ValidatorInterface
{
    const EXPECTED_ID_INDEX = 0;
    const EXPECTED_TITLE_INDEX = 1;
    const EXPECTED_CONTENT_INDEX = 2;
    const EXPECTED_STATE_INDEX = 3;
    const EXPECTED_PUBLISHED_INDEX = 4;
    const EXPECTED_PUBLISHED_AT_INDEX = 5;

    /**
     * @param $valuesToValidate
     * @throws InvalidArgumentException
     * @throws MissingIdentifierException
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
            Post::ID => isset($valuesToValidate[Post::ID])
                ? $valuesToValidate[Post::ID]
                : $valuesToValidate[self::EXPECTED_ID_INDEX],
            Post::TITLE => isset($valuesToValidate[Post::TITLE])
                ? $valuesToValidate[Post::TITLE]
                : $valuesToValidate[self::EXPECTED_TITLE_INDEX],
            Post::CONTENT => isset($valuesToValidate[Post::CONTENT])
                ? $valuesToValidate[Post::CONTENT]
                : $valuesToValidate[self::EXPECTED_CONTENT_INDEX],
            Post::STATE => isset($valuesToValidate[Post::STATE])
                ? $valuesToValidate[Post::STATE]
                : $valuesToValidate[self::EXPECTED_STATE_INDEX],
            Post::PUBLISHED => isset($valuesToValidate[Post::PUBLISHED])
                ? $valuesToValidate[Post::PUBLISHED]
                : $valuesToValidate[self::EXPECTED_PUBLISHED_INDEX],
            Post::PUBLISHED_AT => isset($valuesToValidate[Post::PUBLISHED_AT])
                ? $valuesToValidate[Post::PUBLISHED_AT]
                : $valuesToValidate[self::EXPECTED_PUBLISHED_AT_INDEX],
        ];

        if (!is_integer($postValues[Post::ID])) {
            throw new MissingIdentifierException();
        }

        if (empty($postValues[Post::TITLE])) {
            throw new PostNeedsTitleException();
        }

        if (empty($postValues[Post::CONTENT])) {
            throw new PostNeedsContentException();
        }

        if (empty($postValues[Post::STATE])) {
            throw new PostNeedsStateException();
        }

        if (!is_bool($postValues[Post::PUBLISHED])) {
            throw new InvalidArgumentException();
        }

        if (!$postValues[Post::PUBLISHED_AT] instanceof \DateTime) {
            throw new InvalidArgumentException();
        }
    }
}