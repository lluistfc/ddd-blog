<?php
namespace Tests\Domain\DataObject\Identifier;

use Blog\Domain\DataObject\Identifier\Identifier;

/**
 * Class IdentifierTest
 * @package Tests\Domain\DataObject\Identifier
 * @group domain
 * @group domain_dataObject
 * @group domain_dataObject_identifier
 */
class IdentifierTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @access public
     * @test
     */
    public function identifierIsCreated()
    {
        $this->assertInstanceOf(Identifier::class, Identifier::create());
    }

    /**
     * @access public
     * @test
     */
    public function identifierValueCanBeRetrieved()
    {
        $this->assertTrue(is_string((Identifier::create())->get()));
    }

    /**
     * @access public
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\InvalidArgumentException
     */
    public function invalidValueCausesException()
    {
        Identifier::createFromValue(new class{});
    }
}
