<?php
namespace Blog\Domain\Validators;

/**
 * Interface Validator
 * @package Blog
 */
interface ValidatorInterface
{
    /**
     * @param $data
     * @return bool
     */
    public function validate($data);
}