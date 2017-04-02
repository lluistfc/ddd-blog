<?php
namespace Blog\Tests\Application\Command;

use Blog\Application\Command\Post\UpdatePostCommand;
use Blog\Tests\Application\Command\Stubs\FakeRepository;

/**
 * Class UpdatePostCommandTest
 * @package Blog\Tests\Application\Command
 */
class UpdatePostCommandTest extends PostCommandTestCase
{
    /**
     * @test
     */
    public function postWasUpdated()
    {
        $repository = new FakeRepository();
        (new UpdatePostCommand($repository, $this->defaultPost()))->execute();

        $this->assertTrue($repository->getEntityWasUpdated());
    }
}
