<?php

namespace App\Tests\Behat\Domain;

use App\Domain\User\DTO\CreateUserDto;
use App\Domain\User\Persister\UserPersisterInterface;
use App\Domain\User\Repository\UserRepositoryInterface;
use App\Domain\User\UserInterface;
use App\Infrastructure\User\User;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;

final class UserContext implements Context
{
    /**
     * @var CreateUserDto
     */
    private $createUserInfos;

    /**
     * @var UserInterface
     */
    private $findedUser;

    /**
     * @var UserPersisterInterface
     */
    private $userPersister;

    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    public function __construct(UserPersisterInterface $userPersister, UserRepositoryInterface $userRepository)
    {
        $this->userPersister = $userPersister;
        $this->userRepository = $userRepository;
    }

    /**
     * @Given /^the creation's user infos:$/
     */
    public function theCreationSUserInfos(TableNode $userInfoTable)
    {
        $userInfoHashColumn = $userInfoTable->getColumnsHash();
        $this->createUserInfos = new CreateUserDto(
            $userInfoHashColumn[0]['Firstname'],
            $userInfoHashColumn[0]['Lastname'],
            $userInfoHashColumn[0]['Username'],
            $userInfoHashColumn[0]['Password'],
        );
    }

    /**
     * @When /^I create a user with this infos$/
     */
    public function iCreateAUserWithThisInfos()
    {
        $user = User::createFromCreateDto($this->createUserInfos);
        $this->userPersister->save($user);
    }

    /**
     * @Then /^I can find it by his username$/
     */
    public function iCanFindItByHisUsername()
    {
        $this->findedUser = $this->userRepository->findOneByUsername($this->createUserInfos->getUsername());
    }

    /**
     * @Given /^the finded user has this infos:$/
     */
    public function theFindedUserHasThisInfos(TableNode $userInfoTable)
    {
        $userInfoHashColumn = $userInfoTable->getColumnsHash();
        Assert::eq($userInfoHashColumn[0]['Firstname'], $this->findedUser->getFirstname());
        Assert::eq($userInfoHashColumn[0]['Lastname'], $this->findedUser->getLastname());
        Assert::eq($userInfoHashColumn[0]['Username'], $this->findedUser->getUsername());
    }
}
