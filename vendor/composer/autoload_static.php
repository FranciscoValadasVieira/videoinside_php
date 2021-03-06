<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfd664c99e457d3e11d758d6cb562272b
{
    public static $prefixLengthsPsr4 = array (
        'U' => 
        array (
            'User\\' => 5,
        ),
        'A' => 
        array (
            'Agenda\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'User\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/User',
        ),
        'Agenda\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Agenda',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfd664c99e457d3e11d758d6cb562272b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfd664c99e457d3e11d758d6cb562272b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfd664c99e457d3e11d758d6cb562272b::$classMap;

        }, null, ClassLoader::class);
    }
}
