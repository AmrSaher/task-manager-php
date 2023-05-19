<?php
    session_start();

    function isAuthed() {
        return isset($_SESSION["user"]);
    }
    function getUser() {
        return isAuthed() ? $_SESSION["user"] : null;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/main.css" />
    <title>Task Manager</title>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <h1 class="brand">Task Manager</h1>
        <nav class="links">
            <ul>
                <li>
                    <a href="../views/index.php">Home</a>
                </li>
                <?php if (!isAuthed()): ?>
                    <li>
                        <a href="../views/login.php">Login</a>
                    </li>
                    <li>
                        <a href="../views/register.php">Register</a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="#" onclick="if (confirm('Are you sure?')) document.getElementById('logout-form').submit()">Logout</a>
                        <form id="logout-form" action="/apis/logout.php" method="post" style="display: none;"></form>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <!-- End Header -->