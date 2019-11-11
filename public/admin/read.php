<?php

function get_all_urls (&$mysqli) {

    $prep_stmt = 'SELECT * FROM `' . DB_PREFIX . 'redirect` ORDER BY `name`';
    $stmt = $mysqli->prepare($prep_stmt);

    if ( ! $stmt->execute() || ! $res = $stmt->get_result()) {
        echo "error";
    } else {

        return $res;

    }
}
