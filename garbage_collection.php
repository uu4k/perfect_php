<?php 

class RefClass
{
    function __construct()
    {
        echo __CLASS__, ' が生成されました', PHP_EOL;
    }

    function __destruct()
    {
        echo __CLASS__, ' が破棄されました', PHP_EOL;
    }
}

$a = new RefClass();
$b = $a;
echo 'unset $a', PHP_EOL;
unset($a);
echo 'unset $b', PHP_EOL;
unset($b);