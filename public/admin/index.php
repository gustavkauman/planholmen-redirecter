<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/../handlers/loader.php';
require_once 'read.php';

?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
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
        <tr>
            <th>Navn</th>
            <th>URL</th>
            <th>Slet</th>
        </tr>
        <?php

            $res = get_all_urls($mysqli);

            while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                echo '<tr>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['url'] . '</td>';
                echo '<td><form method="post" action="delete.php"><input type="hidden" name="id" id="id" value="' . $row["id"] . '"><button style="border:none;background-color: #fff;cursor:pointer;" type="submit"><ion-icon name="close"></ion-icon></button></form>';
                echo '</tr>';
            }

        ?>
    </table>
</div>
<h2>Set aktivt URL</h2>
<div>
    <form action="update.php" method="post">
        <select name="id" id="id">
        <?php

            $res = get_all_urls($mysqli);

            while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                echo '<option ';
                echo 'value="' . $row["id"] . '" ';
                if ($row["active"] == 1) { echo "selected"; };
                echo '>';
                echo $row['name'];
                echo '</option>';
            }

        ?>
        </select>
        <button type="submit">Vælg!</button>
    </form>
</div>
</body>
</html>