<?php
namespace Blog\Application\Command\User;

use Blog\Application\Command\Command;
use Blog\Domain\Entity\User;

/**
 * Class CreateUser
 * @package Blog\Application\Command\Post
 */
class RegisterUserCommand extends Command
{
    /**
     * @access public
     * @param $userValues
     */
    public function execute($userValues)
    {
        $this->entityRepository->persistEntity(User::register(
            $userValues[User::ID],
            $userValues[User::PERSON_NAME],
            $userValues[User::USER_NAME],
            $userValues[User::EMAIL]
        ));
    }
}