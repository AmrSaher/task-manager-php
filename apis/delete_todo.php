<?php
include "../Database.php";

if (isset($_GET["id"])) {
    $db = new Database();

    $id = $_GET["id"];

    $db->query("DELETE FROM todos WHERE id = ?;");
    $db->execute([$id]);
}

header("Location: /views/");
exit;