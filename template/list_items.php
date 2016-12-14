<table border='1' width='500' align='center'>
<?php
foreach ($items as $key => $item): ?>
<tr>
    <td>
        <a href="/home.php<?php echo getUrl($item['id']) ?>">
            <?php echo $item['title'] ?>
        </a>
    </td>
</tr>
<?php endforeach; ?>
</table>