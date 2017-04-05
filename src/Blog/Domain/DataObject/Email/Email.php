<?php
namespace Blog\Domain\DataObject\Email;

use Blog\Domain\DataObject\Name\UserName;
use Blog\Domain\Exceptions\DataObject\Email\InvalidEmailHostException;
use Blog\Domain\Helper\BString;

/**
 * Class Email
 * @package DataObject\Email
 */
class Email
{
    /**
     * @access private
     * @var UserName
     */
    private $username;

    /**
     * @access private
     * @var string
     */
    private $host;

    /**
     * @param UserName $userName
     * @param string $host
     * @return Email
     */
    public static function create(UserName $userName, string $host = ''): Email
    {
        return new Email($userName, $host);
    }

    /**
     * Email constructor.
     * @access private
     * @param UserName $userName
     * @param string $host
     */
    private function __construct(UserName $userName, string $host)
    {
        $this->setUserName($userName);
        $this->setHost($host);
    }

    /**
     * @access private
     * @param UserName $userName
     */
    private function setUserName(UserName $userName)
    {
        $this->username = $userName;
    }

    /**
     * @param string $host
     * @throws InvalidEmailHostException
     */
    private function setHost(string $host)
    {
        $this->host = $host;
    }

    /**
     * @access private
     * @return string
     */
    private function getUserName()
    {
        return $this->username->getFirstName();
    }

    /**
     * @access private
     * @return string
     */
    private function getHost()
    {
        return $this->host;
    }

    /**
     * @access public
     * @return string
     */
    public function get()
    {
        return $this->getUserName() . BString::AT . $this->getHost();
    }

    public function __toString()
    {
        return $this->get();
    }
}