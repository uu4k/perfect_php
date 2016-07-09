<?php 
require '../bootstrap.php';
require '../MiniBlogApplication.php';

$app = new MiniBlogApplication(true); // debugモード
$app->run();