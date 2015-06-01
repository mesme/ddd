<?php

namespace Aswin\DDD\Domain\Service;

use Aswin\DDD\Domain\Contract\UserRepository;
use Aswin\DDD\Domain\Exception\RepositoryNotAvailableException;
use Aswin\DDD\Domain\Model\User;
use Aswin\DDD\Domain\ValueObject\UserIdentity;

class CreateUser {

    private $userRepository;

    function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute($name)
    {
        $user = User::create(
            new UserIdentity(uniqid()),
            $name
        );
        try {
            $this->userRepository->add($user);
        } catch(\Exception $e) {
            throw new RepositoryNotAvailableException();
        }

        return $user;
    }

    public function get($id){
        try {
            return $this->userRepository->get($id);
        } catch(\Exception $e) {
            throw new RepositoryNotAvailableException();
        }
    }

}