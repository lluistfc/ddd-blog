<?php
namespace Tests\Application\Handler\Post;

use Blog\Application\Command\CommandInterface;
use Blog\Application\Handler\Post\RetrievePost;
use Blog\Domain\DataObject\Identifier\Identifier;
use Blog\Domain\Entity\Post;
use Tests\Stubs\Post\FakePostCreator;
use PHPUnit\Framework\TestCase;

/**
 * Class RetrievePostTest
 * @access public
 * @package Tests\Application\Handler\Post
 * @group application
 * @group application_command
 * @group application_command_handler
 */
class RetrievePostTest extends TestCase
{
    /**
     * @access public
     * @test
     */
    public function retrievePostWasHandled()
    {
        $fakeCommand = new class implements CommandInterface {
            public function execute($id)
            {
                /** @var Identifier $id */
                return FakePostCreator::createPost();
            }
        };

        $this->assertInstanceOf(Post::class, (new RetrievePost(Identifier::create()))->handle($fakeCommand));
    }
}
