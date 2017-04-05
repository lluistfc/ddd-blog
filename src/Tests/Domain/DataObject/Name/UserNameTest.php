<?php
namespace Tests\Domain\DataObject\Name;

use Blog\Domain\DataObject\Name\UserName;
use PHPUnit\Framework\TestCase;

/**
 * Class UserNameTest
 * @group domain
 * @group domain_dataObject
 * @package Tests\Domain\DataObject
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
