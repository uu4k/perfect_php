<?php

$my_pow = function($times = 2)
{
    return function ($v) use (&$times)
    {
        return pow($v,$times);
    };
};

$cube = $my_pow(3); // 3条行う関数を定義
echo $cube(1), PHP_EOL;
echo $cube(2), PHP_EOL;
echo $cube(4), PHP_EOL;
echo $cube(8), PHP_EOL;

// これだとtimesの値がどこにも保持されず、毎回引数で渡す必要がある。
// useを使った場合は、最初の定義の際のtimesがクロージャーとして保持されているため、引数で渡す必要が無い
// $my_pow = function($times = 2)
// {
//     return function ($v, $times)
//     {
//         return pow($v,$times);
//     };
// };