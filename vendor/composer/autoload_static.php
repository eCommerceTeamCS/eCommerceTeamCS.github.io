<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd4f66bba82e508687603f27a3b72e380
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Monolog' => 
            array (
                0 => __DIR__ . '/..' . '/monolog/monolog/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd4f66bba82e508687603f27a3b72e380::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd4f66bba82e508687603f27a3b72e380::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitd4f66bba82e508687603f27a3b72e380::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
