<?php

declare(strict_types=1);

namespace App\Utils\Factory;

use Aego\OAuth2\Client\Provider\YandexResourceOwner;
use App\Entity\User;
use App\Utils\Oauth2\Vk\VkUser;
use League\OAuth2\Client\Provider\GithubResourceOwner;
use League\OAuth2\Client\Provider\GoogleUser;

class UserFactory
{
    public static function createUserFromGoogle(GoogleUser $googleUser): User
    {
        $user = new User();
        $user->setEmail($googleUser->getEmail());
        $user->setFullName($googleUser->getName());
        $user->setGoogleId($googleUser->getId());
        // $user->setIsVerified(true);

        return $user;
    }

    public static function createUserFromYandex(YandexResourceOwner $yandexUser): User
    {
        $user = new User();
        $user->setEmail($yandexUser->getEmail());
        $user->setFullName($yandexUser->getName());
        $user->setYandexId($yandexUser->getId());
        // $user->setIsVerified(true);

        return $user;
    }

    public static function createUserFromVk(VkUser $vkontakteUser): User
    {
        $user = new User();
        $user->setEmail($vkontakteUser->getEmail());
        $user->setFullName($vkontakteUser->getFullName());
        $user->setVkontakteId($vkontakteUser->getId());
        // $user->setIsVerified(true);

        return $user;
    }

    public static function createUserFromGithub(GithubResourceOwner $githubUser): User
    {
        $user = new User();
        $user->setEmail($githubUser->getEmail());
        $user->setFullName($githubUser->getName());
        $user->setGithubId((string) $githubUser->getId());
        // $user->setIsVerified(true);

        return $user;
    }
}
