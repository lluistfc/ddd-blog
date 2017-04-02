<?php
namespace Blog\Domain\DataObject\Name;

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
     * @access public
     * @param string $firstName
     * @param string $lastName
     * @return PersonName
     */
    public static function create(string $firstName = '', string $lastName = ''):PersonName
    {
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
        $lastName = $this->getLastName();

        if ($lastName !== '') {
            $fullName .= ' ' . $this->getLastName();
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