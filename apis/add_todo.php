<?php
include "../Database.php";

session_start();
$user = $_SESSION["user"];

if (isset($_POST["add_todo"])) {
    $db = new Database();

    $todo = $_POST["todo"];
    $user_id = $user["id"];

    $db->query("INSERT INTO todos (todo, user_id, is_completed) VALUES (?, ?, ?);");
    $db->execute([
        $todo,
        $user_id,
        false
    ]);
    header("Location: /views/");
    exit;
}