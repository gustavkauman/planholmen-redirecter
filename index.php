<?php

require_once __DIR__ . '/handlers/loader.php';
$test = __DIR__;
$stmt = $mysqli->prepare("SELECT `url` FROM `" . DB_PREFIX . "redirect` WHERE `active` = 1 ORDER BY `id` LIMIT 1");

if ( $stmt->execute()) {

    if ($res = $stmt->get_result()->fetch_array(MYSQLI_ASSOC)) {
        header('Location: ' . $res['url']);
    }

} else {
    echo "fejl";
}