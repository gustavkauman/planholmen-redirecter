<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/../handlers/loader.php';

$stmt = $mysqli->prepare("SELECT `url` FROM `" . DB_PREFIX . "redirect` WHERE `active` = 1");

if ( $stmt->execute() && $stmt->num_rows = 1 && $res = $stmt->get_result()->fetch_array(MYSQLI_ASSOC) ) {
    header('Location: ' . $res['url']);
}