<?php

require_once __DIR__ . '/../handlers/loader.php';

$name = $_POST['name'];
$url = $_POST['url'];

$stmt = $mysqli->prepare('INSERT INTO `' . DB_PREFIX . 'redirect` (`name`, `url`) VALUES (?, ?)');
$stmt->bind_param('ss', $name, $url);

if ($stmt->execute()) {
    header('Location: http://' . BASE_URL . '/admin/?success=1');
}
