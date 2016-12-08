<html>
    <head>
        <title>Load file on server</title>
    </head>
    <body>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="file" name="my_file">
        <input type="submit" value="Upload on server" name="send">
    </form>
    </body>
</html>


<?php

include "userfunction.php";

$userFilesDir = __DIR__ . '/user_files';

processUploadFile($userFilesDir);
deleteFileProcess($userFilesDir);
processCreateFile($userFilesDir);

if ($_GET['edit']) {
    editFileForm($userFilesDir);
} else {
    fileListForm($userFilesDir);
}

