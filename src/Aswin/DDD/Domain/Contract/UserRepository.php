<?php

namespace Aswin\DDD\Domain\Contract;

use Aswin\DDD\Domain\Model\User;
use Aswin\DDD\Domain\ValueObject\UserIdentity;

interface UserRepository
{
    /**
     * @param User $user
     * @return mixed
     */
    public function add(User $user);

    /**
     * @param UserIdentity $userId
     * @return mixed
     */
    public function get(UserIdentity $userId);




}