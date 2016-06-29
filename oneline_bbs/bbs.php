<?php

$link = mysql_connect('localhost','root','owarino9629RU@m');

if(!$link) {
    die('cannot connect db:'.mysql_error());
}

mysql_select_db('oneline_bbs',$link);

$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = null;
    if(!isset($_POST['name']) || !strlen($_POST['name'])) {
        $errors['name'] = 'please input name.';
    } else if (strlen($_POST['name']) > 40) {
        $errors['name'] = 'name length < 40';
    } else {
        $name = $_POST['name'];
    }

    $comment = null;
    if(!isset($_POST['comment']) || !strlen($_POST['comment'])) {
        $errors['comment'] = 'please input comment.';
    } else if (strlen($_POST['comment']) > 200) {
        $errors['comment'] = 'comment length < 200';
    } else {
        $comment = $_POST['comment'];
    }

    if (count($errors) === 0) {
        $sql = "INSERT INTO `post` (`name`, `comment`, `created_at`) VALUES ('"
        . mysql_real_escape_string($name) . "','"
        . mysql_real_escape_string($comment) . "','"
        . date('Y-m-d H:i:s') .  "')";

        mysql_query($sql, $link);

        header('Location: http://' .$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
}

$sql = "SELECT * FROM `post` ORDER BY `created_at` DESC";
$result = mysql_query($sql, $link);

$posts = array();
if ($result !== false && mysql_num_rows($result)) {
    while ($post = mysql_fetch_assoc($result)) {
        $posts[] = $post;
    }
}
mysql_free_result($result);
mysql_close($link);

include 'views/bbs_view.php';