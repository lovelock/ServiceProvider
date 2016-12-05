<?php
/**
 * Created by PhpStorm.
 * User: Frost Wong <frostwong@gmail.com>
 * Date: 12/5/16
 * Time: 9:42 PM
 */

namespace ServiceProvider;


class TestClass
{
    protected $bar;

    public function __construct($a, $b)
    {
        $this->bar = $a + $b;
    }

    public function foo()
    {
        return $this->bar;
    }
}