<?php

namespace Aswin\DDD\Domain\Tests;

use Aswin\DDD\Domain\Model\User;
use Aswin\DDD\Domain\Service\CreateUser;
use Aswin\DDD\Domain\ValueObject\UserIdentity;
use Aswin\DDD\Domain\ValueObject\Name;


class UserTest extends \PHPUnit_Framework_TestCase
{
    public function test_create_user()
    {
        $user = User::create(new UserIdentity(1), new Name('aswin' ,'sundaram'));
        $this->assertInstanceOf('Aswin\DDD\Domain\Model\User', $user);
    }


    /**
     * @expectedException \Aswin\DDD\Domain\Exception\RepositoryNotAvailableException
     */
    public function test_when_repository_not_available_an_exception_should_be_thrown()
    {
        $userRepository = new NotAvailableRepository();
        $useCase = new CreateUser($userRepository);
        $useCase->execute(new Name('aswin' ,'sundaram'));
    }

    /**
     * @expectedException \Aswin\DDD\Domain\Exception\RepositoryNotAvailableException
     */
    public function test_when_repository_is_read_only_an_exception_should_be_thrown()
    {
        //write
        $userRepository = new ReadOnlyAvailableRepository();
        $useCase = new CreateUser($userRepository);
        $useCase->execute(new Name('aswin' ,'sundaram'));

        //fetch
        $user = $useCase->get(1);
        $this->assertInstanceOf('Aswin\DDD\Domain\Model\User', $user);
    }

} 