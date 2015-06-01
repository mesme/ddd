<?php

namespace Aswin\DDD\Domain\Tests;


use Aswin\DDD\Domain\Contract\UserRepository;
use Aswin\DDD\Domain\Model\User;
use Aswin\DDD\Domain\ValueObject\UserIdentity;
use Aswin\DDD\Domain\Exception\RepositoryNotAvailableException;

class NotAvailableRepository implements UserRepository {

    public function add(User $user)
    {
        throw new RepositoryNotAvailableException();
    }

    public function get(UserIdentity $userId)
    {
        throw new RepositoryNotAvailableException();
    }


}