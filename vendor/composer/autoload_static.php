<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc612b1a1f5fd5dbc6f16b9aacd5a667a
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tokalink\\Starter\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tokalink\\Starter\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc612b1a1f5fd5dbc6f16b9aacd5a667a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc612b1a1f5fd5dbc6f16b9aacd5a667a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc612b1a1f5fd5dbc6f16b9aacd5a667a::$classMap;

        }, null, ClassLoader::class);
    }
}
