<?php

declare(strict_types=1);

namespace App\Utils\Factory;

use Aego\OAuth2\Client\Provider\YandexResourceOwner;
use App\Entity\User;
use League\OAuth2\Client\Provider\GoogleUser;

class UserFactory
{
    /**
     * @param GoogleUser $googleUser
     *
     * @return User
     */
    public static function createUserFromGoogle(GoogleUser $googleUser): User
    {
        $user = new User();
        $user->setEmail($googleUser->getEmail());
        $user->setFullName($googleUser->getName());
        $user->setGoogleId($googleUser->getId());
        //$user->setIsVerified(true);

        return $user;
    }

    /**
     * @param YandexResourceOwner $yandexUser
     *
     * @return User
     */
    public static function createUserFromYandex(YandexResourceOwner $yandexUser): User
    {
        $user = new User();
        $user->setEmail($yandexUser->getEmail());
        $user->setFullName($yandexUser->getName());
        $user->setYandexId($yandexUser->getId());
        //$user->setIsVerified(true);

        return $user;
    }
}
