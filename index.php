<html xmlns="http://www.w3.org/1999/html">
    <head>
        <title></title>
    </head>
    <body>
        <table>
            <tr>
                <td>
                    <li><a href="index.php?page=1">Page 1</a></li>
                    <li><a href="index.php?page=2">Page 2</a></li>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    $page = $_GET['page'];

                    if ($page == 1) {
                        ?>
                        <form action="index.php" method="POST">
                            <input name="subject" value=""><br>
                            <textarea name="msg"></textarea><br>
                            <input type="submit" value="Send">
                        </form>
                        <?php
                    } elseif ($page == 2) {
                        echo "Second page";
                    } else {
                        echo "Home page";
                    }
                    ?>
                </td>
            </tr>
        </table>


    </body>
</html>

<?php

//$pages = array(
//    1 => array(
//        'title' => 'First',
//        'content' => 'Content first page'
//    ),
//    2 => array(
//        'title' => 'Second',
//        'content' => 'Content of second page'
//    )
//);

?>
