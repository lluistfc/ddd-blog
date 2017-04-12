<?php
namespace Blog\Application\Hydrator\Post;

use Blog\Application\Hydrator\Hydrator;
use Blog\Domain\DataObject\Identifier\Identifier;
use Blog\Domain\Entity\Post;

/**
 * Class PostHydrator
 * @package Blog\Application\Hydrator\Post
 */
class PostHydrator implements Hydrator
{
    /**
     * @param array $postHydrationValues
     * @return Post
     */
    public function hydrate(array $postHydrationValues)
    {
        $id = $this->extractId($postHydrationValues);
        $post = Post::publish(...$postHydrationValues);

        $injectIdentifier = new \ReflectionMethod($post, 'setId');
        $injectIdentifier->setAccessible(true);
        $injectIdentifier->invoke($post, Identifier::createFromValue($id));

        return $post;
    }

    /**
     * @param $postHydrationValues
     * @return mixed
     */
    private function extractId(&$postHydrationValues)
    {
        if ($this->isInputAssociative($postHydrationValues)) {
            $this->removeStringKeysFromArray($postHydrationValues);
        }

        return array_shift($postHydrationValues);
    }

    /**
     * @param $postHydrationValues
     * @return bool
     */
    private function isInputAssociative(&$postHydrationValues): bool
    {
        $isAssoc = true;
        $keys = array_keys($postHydrationValues);

        foreach ($keys as $key) {
            $isAssoc &= is_string($key);
        }

        return $isAssoc;
    }

    /**
     * @param $postHydrationValues
     * @return array
     */
    private function removeStringKeysFromArray(&$postHydrationValues)
    {
        foreach ($postHydrationValues as $k => $value) {
            $postHydrationValues[] = $value;
            unset($postHydrationValues[$k]);
        }
    }
}