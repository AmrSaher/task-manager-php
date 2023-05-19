<?php
    include "../includes/header.php";
    include "../Database.php";

    if (!isAuthed()) {
        header("Location: /views/login.php");
        exit;
    }

    $db = new Database();

    $db->query("SELECT * FROM todos WHERE user_id = ?;");
    $todos = $db->fetchAll([
        getUser()["id"]
    ]);
?>
    <link rel="stylesheet" href="../assets/styles/home.css" />
    <div class="wrapper">
        <div class="card">
            <form action="/apis/add_todo.php" method="post" class="add-todo-form">
                <div class="field">
                    <label for="todo">Todo</label>
                    <input type="text" id="todo" name="todo" placeholder="Todo" require class="inp" />
                </div>
                <input type="submit" value="Add" class="btn" name="add_todo" />
            </form>
            <ul class="todos">
                <?php foreach($todos as $todo): ?>
                    <li>
                        <span class="<?= $todo["is_completed"] ? "completed" : "" ?>"><?= $todo["todo"]; ?></span>
                        <div class="actions">
                            <button class="btn green" onclick="document.getElementById('toggle-todo-<?= $todo['id'] ?>').submit()">
                                Complete
                                <form action="/apis/toggle_todo.php" id="toggle-todo-<?= $todo['id'] ?>" style="display: none;" method="get">
                                    <input type="hidden" name="id" value="<?= $todo["id"] ?>">
                                </form>
                            </button>
                            <button class="btn red" onclick="document.getElementById('delete-todo-<?= $todo['id'] ?>').submit()">
                                Delete
                                <form action="/apis/delete_todo.php" id="delete-todo-<?= $todo['id'] ?>" style="display: none;" method="get">
                                    <input type="hidden" name="id" value="<?= $todo["id"] ?>">
                                </form>
                            </button>
                        </div>
                    </li>    
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php include "../includes/footer.php"; ?>