<?php
namespace Blog\Tests\Domain\DataObject;

use Blog\Domain\DataObject\PersonName;
use PHPUnit\Framework\TestCase;

/**
 * Class PersonNameTest
 * @package Blog\Tests\Domain\DataObject
 * @group domain
 * @group domain_dataObject
 */
class PersonNameTest extends TestCase
{
    /**
     * @access public
     * @test
     */
    public function personCanHaveOnlyFirstName()
    {
        $expectedName = 'John';
        $personName = PersonName::create($expectedName, '');

        $this->assertEquals($expectedName, $personName->getFirstName());
        $this->assertEquals($expectedName, $personName->getFullName());
    }

    /**
     * @access public
     * @test
     */
    public function personHasLastName()
    {
        $expectedLastName = 'Doh';
        $personName = PersonName::create('', 'Doh');

        $this->assertEquals($expectedLastName, $personName->getLastName());
    }

    /**
     * @access public
     * @test
     * @returns array
     */
    public function personHasFullName()
    {
        $lastName = 'Doh';
        $firstName = 'John';
        $expectedFullName = $firstName . ' ' . $lastName;

        $person = PersonName::create($firstName, $lastName);

        $this->assertEquals($expectedFullName, $person->getFullName());
    }

    /**
     * @access public
     * @test
     */
    public function personNameDataObjectCanBePrinted()
    {
        $lastName = 'Doh';
        $firstName = 'John';
        $expectedFullName = $firstName . ' ' . $lastName;

        $personName = PersonName::create($firstName, $lastName);

        $this->assertEquals($expectedFullName, print_r((string) $personName, true));
    }
}
