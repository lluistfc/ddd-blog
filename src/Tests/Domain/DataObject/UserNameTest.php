<?php
namespace Blog\Tests\Domain\DataObject;


use Blog\Domain\DataObject\UserName;
use Domain\Entity\User;
use PHPUnit\Framework\TestCase;

/**
 * Class UserNameTest
 * @group domain
 * @group domain_dataObject
 * @package Blog\Tests\Domain\DataObject
 */
class UserNameTest extends TestCase
{
    /**
     * @access public
     * @test
     */
    public function userHasName()
    {
        $expectedName = 'bettyboom';
        $userName = UserName::create($expectedName);

        $this->assertEquals($expectedName, $userName->getFirstName());
    }

    /**
     * @access public
     * @test
     */
    public function personNameDataObjectCanBePrinted()
    {
        $expectedName = 'bettyboom';
        $userName = UserName::create($expectedName);
        $this->assertEquals($expectedName, print_r((string) $userName, true));
    }
}
