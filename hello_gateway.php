<?php 
class Foo {
    public function helloGateway()
    {
        // self::hello();
        static::hello();
    }

    public function helloGateway2()
    {
        $this->hello2();
    }

    public static function hello()
    {
        echo __CLASS__, ' hello!', PHP_EOL;
    }
    public function hello2()
    {
        echo __CLASS__, ' hello*2!', PHP_EOL;
    }
}

class Bar extends Foo {
    public static function hello()
    {
        echo __CLASS__, ' hello!', PHP_EOL;
    }
    public function hello2()
    {
        echo __CLASS__, ' hello2!', PHP_EOL;
    }
}

$bar = new Bar();
$bar->helloGateway();
$bar->helloGateway2();