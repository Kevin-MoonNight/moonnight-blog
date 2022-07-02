<?php

namespace Tests;

use Mews\Captcha\Captcha;

class CaptchaFake extends Captcha
{
    public static string $expectedValue = '';

    public static function fake(string $value = ''): void
    {
        self::$expectedValue = $value;

        app()->bind('captcha', function ($app) {
            return new CaptchaFake(
                $app['Illuminate\Filesystem\Filesystem'],
                $app['Illuminate\Contracts\Config\Repository'],
                $app['Intervention\Image\ImageManager'],
                $app['Illuminate\Session\Store'],
                $app['Illuminate\Hashing\BcryptHasher'],
                $app['Illuminate\Support\Str']
            );
        });
    }

    public function check(string $value): bool
    {
        return self::$expectedValue === $value;
    }
}
