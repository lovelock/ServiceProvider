<?php

/**
 * Created by PhpStorm.
 * User: Frost Wong <frostwong@gmail.com>
 * Date: 12/5/16
 * Time: 9:27 PM
 */

namespace ServiceProvider;

class ServiceProvider
{
    protected static $serviceBag = [];

    public static function get(string $class, array $args, bool $single = true)
    {
        if ($single) {
            $id = $class . json_encode($args);
            if (!array_key_exists($id, self::$serviceBag)) {
                self::$serviceBag[$id] = new $class(...$args);
            }

            return self::$serviceBag[$id];
        }

        return new $class(...$args);
    }

    private function __construct()
    {
    }

    private function __clone()
    {
        throw new ServiceProviderException('This class can not be cloned.');
    }

    private function __wakeup()
    {
        throw new ServiceProviderException('This class can not be unserialized.');
    }
}