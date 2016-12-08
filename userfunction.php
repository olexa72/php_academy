<?php

/**
 * Process deleting File
 *
 * @param $userFilesDir
 */
function deleteFileProcess($userFilesDir)
{
    if (isset($_GET['delete'])) {
        $fileHash = $_GET['delete'];
        foreach (scandir($userFilesDir) as $item) {
            if (md5($item) == $fileHash) {
                $path = $userFilesDir . '/' . $item;
                if (is_file($path)) {
                    unlink($path);
                } elseif(is_dir($path)) {
                    rmdir($path);
                } else {
                    echo "error";
                }
            }
        }
    }
}

/**
 * Process uploading File
 *
 * @param $userFilesDir
 */
function processUploadFile($userFilesDir)
{
    $tmpName = $_FILES['my_file']['tmp_name'];
    if (is_uploaded_file($tmpName)) {
        $origName = $_FILES['my_file']['name'];
        $newFileName = $userFilesDir . '/' . $origName;
        move_uploaded_file($tmpName, $newFileName);
    }
}

function findFileByHash($userFilesDir, $hash)
{
    $items = scandir($userFilesDir);
    foreach ($items as $item) {
        $path = $userFilesDir . '/' . $item;
        if (md5($item) == $hash) {
            return $path;
        }
    }
}

function processCreateFile($userFilesDir)
{
    if (isset($_POST['new_file'])) {
        $newFile = $userFilesDir . '/' . $_POST['filename'];
        file_put_contents($newFile, '');
    }
}

function fileListForm($userFilesDir)
{
$items = scandir($userFilesDir);

echo "<form action='index.php' method='post'>
<table border='1' width='100%'>";
foreach ($items as $item) {
    $hash = md5($item);
    $path = $userFilesDir. '/'. $item;
    echo "<tr>
    <td>
        <a href='index.php?edit={$hash}'>Edit</a>
        <input type='checkbox' name='delete[]' value='$path'>            
    </td>
    <td>";
    if (is_file($userFilesDir. '/'. $item)) {
        echo "<br>" . $item . ' - is file';
    } else {
        echo "<br>" . $item . ' - is dir';
    }
    echo "</td></tr>";
}

echo "</table>
<input type='submit' name='send1'>
</form>";

echo '<form action="index.php" method="post">
    <input type="text" name="filename">
    <input type="submit" name="new_file" value="New File">
</form>';

}

function editFileForm($userFilesDir)
{
    $fileHash = $_GET['edit'];
    $filepath = findFileByHash($userFilesDir, $fileHash);
    if (file_exists($filepath)) {
        echo "<form action='index.php' method='post'>";
        $content = file_get_contents($filepath);
        echo "<textarea name='content'>". $content ."</textarea>";
        echo "<br> <input type='submit' value='Save' name='edit_save'>";
        echo "</form>";
    } else {
        echo "File not exits";
    }

}