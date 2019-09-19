<?php

namespace App\Tests\Behat\Domain;

use App\Domain\User\DTO\CreateUserDto;
use App\Domain\User\Persister\UserPersisterInterface;
use App\Domain\User\Repository\UserRepositoryInterface;
use App\Domain\User\UserInterface;
use App\Entity\User;
use App\Infrastructure\User\DTO\SymfonyUserLogDto;
use App\Security\LoginFormAuthenticator;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use Psr\Log\LoggerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Webmozart\Assert\Assert;

final class UserContext implements Context
{
    private CreateUserDto $createUserInfos;

    private UserInterface $findedUser;

    private UserPersisterInterface $userPersister;

    private UserRepositoryInterface $userRepository;

    private SymfonyUserLogDto $logUserInfos;

    private bool $successfulLogin;

    private CsrfTokenManagerInterface $csrfTokenManager;

    private CsrfToken $csrfToken;

    private LoginFormAuthenticator $authenticator;

    private UserProviderInterface $userProvider;

    private LoggerInterface $logger;

    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(UserPersisterInterface $userPersister, UserRepositoryInterface $userRepository, CsrfTokenManagerInterface $csrfTokenManager, LoginFormAuthenticator $authenticator, UserProviderInterface $userProvider, LoggerInterface $logger, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->userPersister = $userPersister;
        $this->userRepository = $userRepository;
        $this->csrfTokenManager = $csrfTokenManager;
        $this->authenticator = $authenticator;
        $this->userProvider = $userProvider;
        $this->logger = $logger;
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @Given /^the registered users:$/
     */
    public function theRegisteredUsers(TableNode $usersInfosTable)
    {
        $usersInfosHashColumns = $usersInfosTable->getColumnsHash();
        foreach ($usersInfosHashColumns as $userInfoHashColumns) {
            $this->createUserInfos = new CreateUserDto(
                $userInfoHashColumns['Firstname'],
                $userInfoHashColumns['Lastname'],
                $userInfoHashColumns['Username'],
                '',
                [$userInfoHashColumns['Role']]
            );
            $user = User::createFromCreateDto($this->createUserInfos);
            $password = $this->passwordEncoder->encodePassword($user, $userInfoHashColumns['Password']);
            $this->createUserInfos = new CreateUserDto(
                $userInfoHashColumns['Firstname'],
                $userInfoHashColumns['Lastname'],
                $userInfoHashColumns['Username'],
                $password,
                [$userInfoHashColumns['Role']]
            );
            $user = User::createFromCreateDto($this->createUserInfos);
            $this->userPersister->save($user);
        }
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
            [$userInfoHashColumn[0]['Role']]
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
        Assert::eq([$userInfoHashColumn[0]['Role']], $this->findedUser->getRoles());
    }

    /**
     * @Given /^the log's information:$/
     */
    public function theLogSInformation(TableNode $userLogInfoTable)
    {
        $userLogInfoHashColumn = $userLogInfoTable->getColumnsHash();
        $this->csrfToken = $this->csrfTokenManager->getToken('authenticate');
        $this->logUserInfos = new SymfonyUserLogDto($userLogInfoHashColumn[0]['Username'], $userLogInfoHashColumn[0]['Password'], $this->csrfToken->getValue());
    }

    /**
     * @When /^I try to login$/
     */
    public function iTryToLogin()
    {
        try {
            $user = $this->authenticator->getUser($this->logUserInfos, $this->userProvider);
            $this->successfulLogin = $this->authenticator->checkCredentials($this->logUserInfos, $user);
        } catch (\Exception $e) {
            $this->logger->debug($e->getMessage());
            $this->successfulLogin = false;
        }
    }

    /**
     * @Then /^I am successed logged$/
     */
    public function iAmSuccessedLogged()
    {
        Assert::true($this->successfulLogin);
    }

    /**
     * @Then /^I am not successed logged$/
     */
    public function iAmNotSuccessedLogged()
    {
        Assert::false($this->successfulLogin);
    }
}
