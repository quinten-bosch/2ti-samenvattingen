<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit16d86c28f93e307b8c10ff3d46478252
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'cebe\\markdown\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'cebe\\markdown\\' => 
        array (
            0 => __DIR__ . '/..' . '/cebe/markdown',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit16d86c28f93e307b8c10ff3d46478252::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit16d86c28f93e307b8c10ff3d46478252::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit16d86c28f93e307b8c10ff3d46478252::$classMap;

        }, null, ClassLoader::class);
    }
}
