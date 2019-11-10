<?php

function get_all_urls (&$mysqli) {

    $prep_stmt = 'SELECT * FROM `' . DB_PREFIX . 'redirect`';
    $stmt = $mysqli->prepare($prep_stmt);

    $out = '';

    if ( ! $stmt->execute() || ! $res = $stmt->get_result()) {
        echo "error";
    } else {
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $out .= '<tr>';
            $out .= '<td>' . $row['name'] . '</td>';
            $out .= '<td>' . $row['url'] . '</td>';
            $out .= '</tr>';
        }
    }

    return $out;

}
