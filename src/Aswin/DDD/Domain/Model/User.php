<?php

namespace Aswin\DDD\Domain\Model;

use Aswin\DDD\Domain\ValueObject\UserIdentity;
use Aswin\DDD\Domain\ValueObject\Name;


class User
{
    private $UserIdentity;
    private $name;

    private function __construct(UserIdentity $UserIdentity, Name $name)
    {
        $this->UserIdentity = $UserIdentity;
        $this->name     = $name;
    }

    public static function create(UserIdentity $UserIdentity, $name)
    {
        return new self($UserIdentity, $name);

    }

    public function getIdentity()
    {
        return $this->UserIdentity;
    }
} 