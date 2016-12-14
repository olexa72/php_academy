<?php

include_once "lib/list.php";

runApplication();

function runApplication()
{
    ob_start();

    if (isset($_GET['page']) && $_GET['page'] > 0) {
        viewItem();
    } elseif (isset($_GET['secure'])) {
        if (isset($_GET['add_news'])) {
            addNewsPage();

            if (isset($_POST['add_news_send'])) {
                echo "Item is added";
                addItem();
            }
        }
        
        session_start();

        if ($_POST['send']
            && $_POST['login'] == 'admin'
            && $_POST['password'] == 111
        ) {
            $_SESSION['user_id'] = 1;
        }

        if (isset($_GET['secure']) && isset($_GET['logout'])) {
            unset($_SESSION['user_id']);
        }

        if ($_SESSION['user_id']) {
            echo "show admin part" . $_SESSION['user_id'];
            echo "<a href='home.php?secure=1&logout=1'>Logout</a>";
        } else {
            loginPage();
        }
    } else {
        listItems();
    }

    $content = ob_get_clean();
    ob_flush();

    require_once "template/base_template.php";
}

function addItem()
{
    $title = $_POST['title'];
    $short_desc = $_POST['short_desc'];
    $long_desc = $_POST['long_desc'];

    $filename = 'db.txt';
    $content = file_get_contents($filename);
    $items = unserialize($content);

    $item = array(
        'id' => count($items) + 1,
        'title' => $title,
        'short_desc' => $short_desc,
        'long_desc' => $long_desc,
        'date' => date('Y-m-d H:i:s')
    );

    $items[] = $item;

    file_put_contents($filename, serialize($items));
}

function loginPage()
{
    ?>
    <form action="home.php?secure=1" method="post">
        Login: <input type="text" name="login">
        Pasword: <input type="password" name="password">
        <input type="submit" name="send">
    </form>

    <?php
}