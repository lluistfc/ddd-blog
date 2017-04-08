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
    const EXPECTED_PUBLISHEDAT_INDEX = 5;

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
            Post::ID => $this->getValue($valuesToValidate, Post::ID, self::EXPECTED_ID_INDEX),
            Post::TITLE => $this->getValue($valuesToValidate, Post::TITLE, self::EXPECTED_TITLE_INDEX),
            Post::CONTENT => $this->getValue($valuesToValidate, Post::CONTENT, self::EXPECTED_CONTENT_INDEX),
            Post::STATE => $this->getValue($valuesToValidate, Post::STATE, self::EXPECTED_STATE_INDEX),
            Post::PUBLISHED => $this->getValue($valuesToValidate, Post::PUBLISHED, self::EXPECTED_PUBLISHED_INDEX),
            Post::PUBLISHEDAT => $this->getValue($valuesToValidate, Post::PUBLISHEDAT, self::EXPECTED_PUBLISHEDAT_INDEX)
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

        if (!$postValues[Post::PUBLISHEDAT] instanceof \DateTime) {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @param $valuesToValidate
     * @param $associativeKey
     * @param $numericKey
     * @return bool|null
     */
    private function getValue($valuesToValidate, $associativeKey, $numericKey)
    {
        if (isset($valuesToValidate[$associativeKey])) {
            return $valuesToValidate[$associativeKey];
        }
        if (isset($valuesToValidate[$numericKey])) {
            return $valuesToValidate[$numericKey];
        }

        return null;
    }
}