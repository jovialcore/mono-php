<?php

namespace Digikraaft\Mono;

use Digikraaft\Mono\Exceptions\InvalidArgumentException;

class Mono
{
    /** @var string The Mono API key to be used for requests. */
    public static string $secretKey;

    /** @var string The instance API key, settable once per new instance */
    private $instanceApiKey;

    /** @var string The base URL for the Mono API. */
    public static $apiBaseUrl = 'https://api.withmono.com';

    /**
     * @return string the API key used for requests
     */
    public static function getSecretKey(): string
    {
        return self::$secretKey;
    }

    /**
     * Sets the API key to be used for requests.
     *
     * @param string $secretKey
     */
    public static function setSecretKey($secretKey): void
    {
        self::validateSecretKey($secretKey);
        self::$secretKey = $secretKey;
    }

    private static function validateSecretKey($secretKey): bool
    {
        if ($secretKey == '' || ! is_string($secretKey)) {
            throw new InvalidArgumentException('Secret key must be a string and cannot be empty');
        }

        return true;
    }
}