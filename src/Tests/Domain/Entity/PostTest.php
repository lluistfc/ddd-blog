<?php
namespace Tests\Domain\Entity;

use Blog\Domain\Entity\Post;
use Blog\Domain\Tools\BString;
use PHPUnit\Framework\TestCase;
use Tests\Domain\DataObject\Name\PersonNameTest;
use Tests\Stubs\Post\FakePostCreator;
use Tests\Stubs\User\FakeUserCreator;

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
     * @param $invalidValues
     * @throws \Exception
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
        $this->assertEquals(FakeUserCreator::create(), $post->getAuthor());
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

    /**
     * @access public
     * @test
     */
    public function postIsWrittenByAnAuthorKnowsByItsRealName()
    {
        $post = FakePostCreator::createPost();
        $expectedName = FakeUserCreator::PERSON_FIRSTNAME . BString::SPACE . FakeUserCreator::PERSON_LASTNAME;

        $this->assertEquals($expectedName, $post->writtenByAuthorName());
    }

    /**
     * @access public
     * @test
     */
    public function postIsWrittenByAnAuthorKnowsByItsUserName()
    {
        $post = FakePostCreator::createPost();
        $expectedName = FakeUserCreator::USER_NAME;

        $this->assertEquals($expectedName, $post->writtenByAuthorAlias());
    }

    /**
     * @return array
     */
    public function invalidDataProvider()
    {
        return array(
            array(array(null, null, null, null, null, null, null)),
            array(array(false, false, false, false, false, false, false)),
            array(array(true, true, true, true, true, true, true)),
            array(array(0, 0, 0, 0, 0, 0, 0)),
        );
    }
}
