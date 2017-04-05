<?php
namespace Tests\Stubs\Post;

use Blog\Domain\Collections\PostCollection;
use Blog\Domain\Repository\PostQueriesRepository;

class FakeReadOnlyRepository extends PostQueriesRepository
{
    public function findOneById(int $id)
    {
        return FakePostCreator::createPost($id);
    }

    /**
     * @inheritdoc
     */
    public function findPostByTitle($title)
    {
        return null;
    }

    public function findNewestPost()
    {
        return FakePostCreator::createPost();
    }

    public function findAllPublishedPosts()
    {
        return new PostCollection();
    }
}