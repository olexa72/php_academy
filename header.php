<?php

header('Location: http://www.example.com/');

header("HTTP/1.0 404 Not Found");
header('Content-type: application/pdf');


header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Дата в прошлом




//ob_start();
//ob_get_contents();
//ob_end_flush();
