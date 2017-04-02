<?php
namespace Blog\Domain\Validators\DataObject\Name;

use Blog\Domain\Exceptions\Validation\FirstNameCannotBeEmptyInUserNameException;
use Blog\Domain\Validators\ValidatorInterface;

/**
 * Class UserNameValidator
 * @package Blog\Domain\Validators\DataObject\Name
 */
class UserNameValidator implements ValidatorInterface
{
    /**
     * @access private
     * @var string
     */
    private $userName;

    /**
     * UserNameValidator constructor.
     * @access public
     * @param string $userName
     */
    public function __construct(string $userName)
    {
        $this->userName = $userName;
    }

    /**
     * @access public
     * @return bool
     * @throws FirstNameCannotBeEmptyInUserNameException
     */
    public function validate()
    {
        if (empty($this->userName)) {
            throw new FirstNameCannotBeEmptyInUserNameException();
        }

        return true;
    }
}