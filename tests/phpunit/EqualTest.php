<?php
use Plumbok\Test\DayOfYear;

/**
 * Created by PhpStorm.
 * User: brzuchal
 * Date: 26.12.16
 * Time: 07:09
 */
class EqualTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        Plumbok\Autoload::register('Plumbok\\Test');
    }

    public function testEqual()
    {
        $this->assertTrue(class_exists(DayOfYear::class));
        $reflection = new ReflectionClass(DayOfYear::class);

        $this->assertTrue($reflection->hasMethod('equalTo'));
    }
}