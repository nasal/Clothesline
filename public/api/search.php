<?php
header('Content-Type: application/json');
?>
{
    "suggestions": [
        <?php
        $db = new mysqli('localhost', 'root', '', 'clothsline');
        $q = $db->query('select * from brands where name like "' . $_GET['query'] . '%" order by name desc');
        $i = 0;
        while ($f = $q->fetch_assoc()) {
            echo ($i > 0 ? ', ' : '') . ' { "value": "' . $f['name'] . '", "data": "' . $f['id'] . '" }' . "\n";
            $i++;
        }
        ?>
    ]
}