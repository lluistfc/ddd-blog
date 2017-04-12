<?php
namespace Blog\Application\Command\User;

use Blog\Application\Command\CommandInterface;
use Blog\Application\Repository\EntityPersistRepository;
use Blog\Domain\Entity\User;

/**
 * Class CreateUser
 * @package Blog\Application\Command\Post
 */
class RegisterUserCommand implements CommandInterface
{
    /**
     * @var EntityPersistRepository
     */
    protected $entityRepository;

    /**
     * Command constructor.
     * @access public
     * @param EntityPersistRepository $entityRepository
     */
    public function __construct(EntityPersistRepository $entityRepository)
    {
        $this->entityRepository = $entityRepository;
    }

    /**
     * @access public
     * @param $userValues
     */
    public function execute($userValues)
    {
        $this->entityRepository->persistEntity(User::register(
            $userValues[User::PERSON_NAME],
            $userValues[User::USER_NAME],
            $userValues[User::EMAIL]
        ));
    }
}