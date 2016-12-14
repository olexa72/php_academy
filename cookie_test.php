<?php

define('ROOT', $_SERVER['DOCUMENT_ROOT']);

echo __DIR__;
echo __LINE__;
echo __FILE__;

echo ROOT;

include __DIR__ . "/mylib.php";
//require "mylib.php";
//
//include_once "mylib.php";
//require_once "mylib.php";

exit();

session_start();

if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
}

echo "You are visit this page " . $_SESSION['count']++ . ' times ';

welcome();
bye();

if (!isset($_COOKIE['items'])) {
    setcookie('items', serialize(array()));
}

$items = unserialize($_COOKIE['items']);

if (isset($_POST['send'])) {
    $items[] = $_POST['msg'];

    setcookie('items', serialize($items));
}

echo "My session ID" .  session_id();

foreach ($items as $item) {
    echo "<hr>" . $item;
}

if (!isset($_COOKIE['first_name'])) {
    setcookie('first_name', 'Yurii');
}

echo "Welcome " . $_COOKIE['first_name'];

?>
<form action="cookie_test.php" method="post">
    <textarea name="msg"></textarea>
    <input name="send" type="submit">
</form>
