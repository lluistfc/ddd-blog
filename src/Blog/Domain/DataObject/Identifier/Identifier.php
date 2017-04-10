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
    const SALT = '3q$r9dYUl';

    /**
     * @access private
     * @var mixed
     */
    private $value;

    /**
     * @access private
     * @return Identifier
     * @throws InvalidArgumentException
     * @internal param $value
     */
    public static function create()
    {
        return new self();
    }

    public static function createFromValue($value)
    {
        return new self($value);
    }

    /**
     * Identifier constructor.
     * @param $value
     * @throws InvalidArgumentException
     */
    private function __construct($value = null)
    {
        if (empty($value)) {
            $this->value = uniqid(crypt(time(), self::SALT));
        } elseif (!is_string($value) && !is_numeric($value)) {
            throw new InvalidArgumentException();
        } else {
            $this->value = $value;
        }
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