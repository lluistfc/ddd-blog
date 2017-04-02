<?php
namespace Blog\Domain\DataObject\Name;

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
     * @access public
     * @param string $firstName
     * @return UserName
     */
    public static function create(string $firstName = ''): UserName
    {
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