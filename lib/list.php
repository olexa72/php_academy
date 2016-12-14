<?php

function listItems()
{
    $items = getItemsFromFile();
    
    include "template/list_items.php";
}

function getItemsFromFile()
{
//    $items = array();

//    for ($i =1; $i < 10; $i++) {
//        $items[] = array(
//            'id' => $i,
//            'title' => 'my title ' . $i,
//            'short_desc' => 'text ' . $i,
//            'long_desc' => 'text',
//            'date' => '2016-12-14'
//        );
//    }

    $content = file_get_contents('db.txt');
    $items = unserialize($content);

    $formatted = array();
    foreach ($items as $item) {
        $id = $item['id'];
        $formatted[$id] = $item;
    }

    if (!is_array($items)) {
        $formatted = array();
    }

    return $formatted;
}

function viewItem()
{
    $items = getItemsFromFile();
    $pageId = $_GET['page'];

    $item = $items[$pageId];

    echo "<h1>" . $item['title'] . "</h1>";
    echo "".$item['long_desc']."";
}

function getUrl($id)
{
    return '?page=' . $id;
}

function addNewsPage()
{
    include "template/add_news.php";
}