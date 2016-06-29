<?php 
namespace Project¥Module;

require_once 'Foo/Bar/Baz.php';
require_once 'Hoge/Fuga.php';
require_once 'Module/Klass/Some.php'

use Foo¥Bar as BBB;
use Hoge¥Fuga;

$obj1 = new ¥Directory();
$obj2 = new BBB¥Baz(); // Foo¥Bar¥Baz
$obj3 = new Fuga(); // Hoge¥Fuga
$obj4 = new Class¥Some();

$obj5 = new Piyo(); // インポートルールに記載ないので、Project¥Module¥Piyo

some_func(); // Project¥Module¥some_func探索→なければglobal関数実行

BBB¥SOME_CONST; // Foo¥Bar¥SOME_CONST

SOME_CONST; // Project¥Module¥SOME_CONST->なければglobalの定数