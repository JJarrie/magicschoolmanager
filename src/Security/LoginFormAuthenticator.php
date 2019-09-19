<?php

namespace App\Security;

use App\Domain\User\Repository\UserRepositoryInterface;
use App\Infrastructure\User\DTO\SymfonyUserLogDto;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

class LoginFormAuthenticator extends AbstractFormLoginAuthenticator
{
    use TargetPathTrait;

    private UrlGeneratorInterface $urlGenerator;
    private CsrfTokenManagerInterface $csrfTokenManager;
    private UserPasswordEncoderInterface $passwordEncoder;
    private UserRepositoryInterface $userRepository;

    public function __construct(UrlGeneratorInterface $urlGenerator, CsrfTokenManagerInterface $csrfTokenManager, UserPasswordEncoderInterface $passwordEncoder, UserRepositoryInterface $userRepository)
    {
        $this->urlGenerator = $urlGenerator;
        $this->csrfTokenManager = $csrfTokenManager;
        $this->passwordEncoder = $passwordEncoder;
        $this->userRepository = $userRepository;
    }

    public function supports(Request $request): bool
    {
        return 'app_login' === $request->attributes->get('_route') && $request->isMethod('POST');
    }

    public function getCredentials(Request $request): SymfonyUserLogDto
    {
        $username = $request->request->get('username');

        if ($request->hasSession()) {
            $request->getSession()->set(Security::LAST_USERNAME, $username);
        }

        return new SymfonyUserLogDto(
            $username,
            $request->request->get('password'),
            $request->request->get('_csrf_token')
        );
    }

    /**
     * @param SymfonyUserLogDto $credentials
     */
    public function getUser($credentials, UserProviderInterface $userProvider): UserInterface
    {
        $token = new CsrfToken('authenticate', $credentials->getCsrfTokenValue());
        if (!$this->csrfTokenManager->isTokenValid($token)) {
            throw new InvalidCsrfTokenException('Invalid CsrfToken');
        }

        $user = $this->userRepository->findOneByUsername($credentials->getUsername());

        if (!$user instanceof UserInterface) {
            throw new CustomUserMessageAuthenticationException('Username could not be found.');
        }

        return $user;
    }

    /**
     * @param SymfonyUserLogDto $credentials
     */
    public function checkCredentials($credentials, UserInterface $user): bool
    {
        return $this->passwordEncoder->isPasswordValid($user, $credentials->getPassword());
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey): Response
    {
        $targetPath = $request->hasSession() ? $this->getTargetPath($request->getSession(), $providerKey) : null;

        if (is_string($targetPath)) {
            return new RedirectResponse($targetPath);
        }

        return new RedirectResponse($this->urlGenerator->generate('app_homepage'));
    }

    protected function getLoginUrl(): string
    {
        return $this->urlGenerator->generate('app_login');
    }
}
