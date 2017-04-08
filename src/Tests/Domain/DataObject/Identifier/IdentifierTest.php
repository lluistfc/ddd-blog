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
        $this->assertInstanceOf(Identifier::class, Identifier::create(1));
    }

    /**
     * @access public
     * @test
     */
    public function identifierValueCanBeRetrieved()
    {
        $this->assertEquals(1, (Identifier::create(1))->get());
    }

    /**
     * @access public
     * @test
     * @dataProvider invalidDataProvider
     * @expectedException \Blog\Domain\Exceptions\Validation\InvalidArgumentException
     */
    public function invalidValuesCauseException($value)
    {
        $this->assertInstanceOf(Identifier::class, Identifier::create($value));
    }

    /**
     * @return array
     */
    public function invalidDataProvider()
    {
        return [
            [null],
            [true],
            [false],
            [array(1)],
            [new class{}],
            [new class{public $a=0;}]
        ];
    }
}
