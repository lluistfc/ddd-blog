<?php
namespace Blog\Domain\DataObject\Name;

use Blog\Domain\Exceptions\Validation\FirstNameCannotBeEmptyInUserNameException;
use Blog\Domain\Helper\BString;

/**
 * Class UserName
 * @package Blog\Domain\DataObject\Name
 */
class UserName extends Name
{
    /**
     * @access protected
     * @var string
     */
    protected $firstName;

    /**
     * @param string $firstName
     * @return UserName
     * @throws FirstNameCannotBeEmptyInUserNameException
     */
    public static function create(string $firstName): UserName
    {
        if (empty($firstName)) {
            throw new FirstNameCannotBeEmptyInUserNameException();
        }
        return new UserName($firstName);
    }

    /**
     * UserName constructor.
     * @access private
     * @param string $firstName
     */
    private function __construct(string $firstName)
    {
        $this->setFirstName($firstName);
    }

    /**
     * @access public
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @access protected
     * @param string $firstName
     */
    protected function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

}