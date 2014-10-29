<?php

$db = new mysqli('localhost', 'root', '', 'clothsline');

switch($_POST['action']) {
    case 'updateFav':
        if ($db->query('select null from favs where user_id = "' . $_POST['uid'] . '" and brand_id = "' . $_POST['bid'] . '"')->num_rows) {
            $db->query('delete from favs where user_id = "' . $_POST['uid'] . '" and brand_id = "' . $_POST['bid'] . '" limit 1');
            echo 'removing';
        } else {
            $db->query('insert into favs (user_id, brand_id) values ("' . $_POST['uid'] . '", "' . $_POST['bid'] . '")');
            echo 'adding';
        }
        break;
    case 'updateLike':
        if ($db->query('select null from user_likes where user_id = "' . $_POST['uid'] . '" and like_id = "' . $_POST['lid'] . '"')->num_rows) {
            $db->query('delete from user_likes where user_id = "' . $_POST['uid'] . '" and like_id = "' . $_POST['lid'] . '" limit 1');
            echo 'removing';
        } else {
            $db->query('insert into user_likes (user_id, like_id) values ("' . $_POST['uid'] . '", "' . $_POST['lid'] . '")');
            echo 'adding';
        }
        break;

    default:
        echo 'error';
}

$db->close();

?>