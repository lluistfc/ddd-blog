<?php
namespace Blog\Domain\Validators\DataObject\Name;

use Blog\Domain\Exceptions\Validation\FirstNameCannotBeEmptyInPersonNameException;
use Blog\Domain\Validators\ValidatorInterface;

/**
 * Class PersonNameValidator
 * @package Blog\Domain\Validators\DataObject\Name
 */
class PersonNameValidator implements ValidatorInterface
{
    /**
     * @access private
     * @var string
     */
    private $firstName;

    /**
     * @access private
     * @var string
     */
    private $lastName;

    public function __construct(string $firstName, string $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * @return bool
     * @throws FirstNameCannotBeEmptyInPersonNameException
     */
    public function validate()
    {
        if (empty($this->firstName)) {
            throw new FirstNameCannotBeEmptyInPersonNameException();
        }

        return true;
    }
}