<?php
namespace Tests\Domain\Entity;

use Blog\Domain\Entity\Post;
use PHPUnit\Framework\TestCase;
use Tests\Stubs\Post\FakePostCreator;

/**
 * Class PostTest
 * @package Tests\Domain
 * @group domain
 * @group domain_entity
 */
class PostTest extends TestCase
{
    const FAKE_TITLE = 'Fake Title';
    const FAKE_CONTENT = 'fake content';
    const FAKE_STATE = 'fake state';
    const PUBLISHED = true;
    const NOT_PUBLISHED = false;

    /**
     * @access public
     * @test
     * @dataProvider invalidDataProvider
     * @expectedException \Exception
     */
    public function postCannotBeEmpty($invalidValues)
    {
        try {
            Post::publish(...$invalidValues);
        } catch (\Error $e) {
            $this->assertInstanceOf(\Error::class, $e);
            throw new \Exception('This exception is thrown to ensure that this test fails if Post::register() implementation changes');
        }
    }

    /**
     * @access public
     * @test
     */
    public function postAttributesAreSet()
    {
        $expectedDateFormat = (new \DateTime())->format('Y-m-d');
        $postData = FakePostCreator::createPostDefaultArrayValues();
        $post = FakePostCreator::createPostFromArray($postData);
        $this->assertEquals(self::FAKE_TITLE, $post->getTitle());
        $this->assertEquals(self::FAKE_CONTENT, $post->getContent());
        $this->assertEquals(self::FAKE_STATE, $post->getState());
        $this->assertTrue($post->isPublished());
        $this->assertEquals($expectedDateFormat, $post->getCreatedAt());
        $this->assertEquals($expectedDateFormat, $post->getPublishedAt());
        $this->assertEquals($expectedDateFormat, $post->getUpdatedAt());
    }

    /**
     * @access public
     * @test
     */
    public function postIsNotPublished()
    {
        $postData = FakePostCreator::createPostDefaultArrayValues();
        $postData[Post::PUBLISHED] = false;
        $post = FakePostCreator::createPostFromArray($postData);
        $this->assertFalse($post->isPublished());
    }

    public function invalidDataProvider()
    {
        return array(
            array(array(null, null, null, null, null, null)),
            array(array(false, false, false, false, false, false)),
            array(array(true, true, true, true, true, true)),
            array(array(0, 0, 0, 0, 0, 0)),
        );
    }
}
