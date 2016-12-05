<?php
/**
 * Created by PhpStorm.
 * User: Frost Wong <frostwong@gmail.com>
 * Date: 12/5/16
 * Time: 9:29 PM
 */

namespace Tests\ServiceProvider;



use PHPUnit_Framework_TestCase;
use ServiceProvider\ServiceProvider;
use ServiceProvider\TestClass;

class ServiceProviderTest extends PHPUnit_Framework_TestCase
{
    public function testNewService()
    {
        $foo = ServiceProvider::getInstance(TestClass::class, [2, 3]);
        $bar = ServiceProvider::getInstance(TestClass::class, [2, 3]);
        $far = ServiceProvider::getInstance(TestClass::class, [3, 4]);

        $this->assertEquals(spl_object_hash($foo), spl_object_hash($bar));
        $this->assertNotEquals(spl_object_hash($foo), spl_object_hash($far));


        $box = ServiceProvider::getInstance(TestClass::class, [4, 5], false);
        $tux = ServiceProvider::getInstance(TestClass::class, [4, 5], false);

        $this->assertNotEquals(spl_object_hash($box), spl_object_hash($tux));
    }
}
