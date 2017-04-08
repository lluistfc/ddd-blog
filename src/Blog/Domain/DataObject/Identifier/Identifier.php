<?php
namespace Blog\Domain\DataObject\Identifier;

use Blog\Domain\Exceptions\Validation\InvalidArgumentException;
use Blog\Domain\Exceptions\Validation\ValidationException;

/**
 * Class Identifier
 * @package Blog\Domain\DataObject\Identifier
 */
class Identifier
{
    /**
     * @access private
     * @var mixed
     */
    private $value;

    /**
     * @access private
     * @param $value
     * @return Identifier
     * @throws ValidationException
     */
    public static function create($value)
    {
        if (empty($value)) {
            throw new InvalidArgumentException();
        }

        if (!is_string($value) && !is_integer($value)) {
            throw new InvalidArgumentException();
        }

        return new self($value);
    }

    /**
     * Identifier constructor.
     * @access private
     * @param $value
     */
    private function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @access public
     * @return mixed
     */
    public function get()
    {
        return $this->value;
    }
}