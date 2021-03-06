<?php
namespace Blog\Domain\DataObject\Name;

use Blog\Domain\Exceptions\Validation\FirstNameCannotBeEmptyInPersonNameException;
use Blog\Domain\Tools\BString;

/**
 * Class Name
 * @package DataObject
 */
class PersonName extends Name
{
    /**
     * @access protected
     * @var string
     */
    protected $firstName;

    /**
     * @access protected
     * @var string
     */
    protected $lastName;

    /**
     * @param string $firstName
     * @param string $lastName
     * @return PersonName
     * @throws FirstNameCannotBeEmptyInPersonNameException
     */
    public static function create(string $firstName, string $lastName = BString::BLANK):PersonName
    {
        if (empty($firstName)) {
            throw new FirstNameCannotBeEmptyInPersonNameException();
        }
        return new PersonName($firstName, $lastName);
    }

    /**
     * PersonName constructor.
     * @access private
     * @param string $firstName
     * @param string $lastName
     */
    private function __construct(string $firstName, string $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    /**
     * @access protected
     * @param string $firstName
     */
    protected function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @access protected
     * @param string $lastName
     */
    protected function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @access public
     * @return string
     */
    public function getFirstName():string
    {
        return $this->firstName;
    }

    /**
     * @access public
     * @return string
     */
    public function getLastName():string
    {
        return $this->lastName;
    }

    /**
     * @access public
     * @return string
     */
    public function get():string
    {
        $fullName = $this->getFirstName();

        if ($this->getLastName() !== BString::BLANK) {
            $fullName .= BString::SPACE . $this->getLastName();
        }

        return $fullName;
    }

    /**
     * @access public
     * @return string
     */
    public function __toString()
    {
        return $this->get();
    }
}