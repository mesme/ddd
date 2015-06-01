<?php

namespace Aswin\DDD\Infrastructure\Repository\Doctrine;

use Aswin\DDD\Domain\ValueObject\UserIdentity;
use Aswin\DDD\Domain\Contract\UserRepository as UserRepositoryInterface;

use Aswin\DDD\Domain\Model\User;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Aswin\DDD\Infrastructure\Repository\Exception\EntityNotFound;


class UserRepository implements UserRepositoryInterface {

    private $doctrine;

    public function __construct(RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function add(User $user)
    {
        $manager = $this->doctrine->getManager();
        $manager->persist($user);
        $manager->flush();
    }

    /**
     * @param UserIdentity $userId
     * @return mixed
     * @throws EntityNotFound
     */
    public function get(UserIdentity $userId)
    {
        if (!$user = $this->doctrine->getRepository(User::class)->find($userId)) {
            throw new EntityNotFound();
        }

        return $user;
    }
}