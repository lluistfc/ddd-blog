<?php
namespace Blog\Domain\Validators\DataObject\Email;

use Blog\Domain\Exceptions\Validation\InvalidEmailFormatException;
use Blog\Domain\Validators\ValidatorInterface;

class EmailValidator implements ValidatorInterface
{
    /**
     * @access private
     * @var string
     */
    private $email;

    /**
     * EmailValidator constructor.
     * @access public
     * @param string $email
     */
    public function __construct(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return bool
     * @access public
     * @throws InvalidEmailFormatException
     */
    public function validate()
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailFormatException();
        }

        return true;
    }
}