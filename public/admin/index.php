<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/../handlers/loader.php';
require_once 'read.php';

?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <title>PLan Holmen Redirector - Admin</title>
</head>
<body>
<h1>PLan Holmen Redirector - Admin</h1>
<h2>Opret nyt link</h2>
<div>
    <form action="create.php" method="post">
        <div>
            <label for="name">Navn</label>
            <input type="text" name="name" id="name" placeholder="Navn / Aktivitet">
        </div>
        <div>
            <label for="url">URL</label>
            <input type="url" name="url" id="url" placeholder="URL">
        </div>
        <div>
            <button type="submit">Tilføj</button>
        </div>
    </form>
</div>
<h2>Se alle links i databasen</h2>
<div>
    <table>
        <?php

            $prep_stmt = 'SELECT * FROM `' . DB_PREFIX . 'redirect`';
            $stmt = $mysqli->prepare($prep_stmt);

            $out = '';

            if ( ! $stmt->execute() || ! $res = $stmt->get_result()) {
                echo "error";
            } else {
                while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                    echo '<tr>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['url'] . '</td>';
                    echo '</tr>';
                }
            }

        ?>
    </table>
</div>
</body>
</html>