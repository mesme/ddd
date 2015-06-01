<?php

namespace Aswin\DDD\Domain\ValueObject;

class UserIdentity
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

} 