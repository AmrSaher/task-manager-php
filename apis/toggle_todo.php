<?php
include "../Database.php";

if (isset($_GET["id"])) {
    $db = new Database();

    $id = $_GET["id"];

    $db->query("SELECT is_completed FROM todos WHERE id = ?;");
    $todo = $db->fetchOne([$id]);

    $db->query("UPDATE todos SET is_completed = ? WHERE id = ?;");
    $db->execute([
        !$todo["is_completed"],
        $id
    ]);
}

header("Location: /views/");
exit;