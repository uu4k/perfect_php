exec PHP script
<?php 
/*
sample php
*/

$number = rand();

if ($number % 2 == 0) {
    echo $number, "は偶然です。", PHP_EOL;
} else {
    echo $number, "は奇数です。", PHP_EOL;
}
?>
end PHP script