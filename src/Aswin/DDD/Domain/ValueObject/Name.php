<?php

namespace Aswin\DDD\Domain\ValueObject;


final class Name
{
    private $firstName;
    private $lastName;

    public function __construct($firstName, $lastName)
    {
        if (!$this->isValidString($firstName)) {
            throw new \InvalidArgumentException('FirstName is not valid');
        }

        if (!$this->isValidString($lastName)) {
            throw new \InvalidArgumentException('LastName is not valid');
        }

        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    private function isValidString($string)
    {
        if($string === null)
        {
            return false;
        }

        return true;
    }

}