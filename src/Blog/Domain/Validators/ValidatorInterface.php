<?php
namespace Blog\Domain\Validators;

/**
 * Interface Validator
 * @package Blog
 */
interface ValidatorInterface
{
    public function validate($data);
}