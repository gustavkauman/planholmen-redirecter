<?php

require_once __DIR__ . '/../handlers/loader.php';

$id = $_POST['id'];

$mysqli->query("UPDATE " . DB_PREFIX . "redirect SET `active` = 0");

$stmt = $mysqli->prepare("UPDATE " . DB_PREFIX . "redirect SET `active` = 1 WHERE `id` = ?");
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    header('Location: http://' . BASE_URL . '/admin/?succes=1');
}
