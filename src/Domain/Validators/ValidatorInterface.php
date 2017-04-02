<?php
namespace Blog\Domain\Validators;

use Blog\Domain\Exceptions\ValidationException;

/**
 * Interface Validator
 * @package Blog
 */
interface ValidatorInterface
{
    /**
     * @return bool
     * @throws ValidationException
     */
    public function validate();
}