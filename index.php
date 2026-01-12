<?php
// Importa a conexão com o banco
require_once 'database/conexao.php';

// Busca as tarefas
$tasks = [];
$sql = $pdo->query("SELECT * FROM task ORDER BY id ASC");

if ($sql->rowCount() > 0) {
    $tasks = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    />
    <link rel="stylesheet" href="src/styles.css">

    <title>My Tasks</title>
</head>
<body>
    <div id="to_do">
        <h1>MY TASKS</h1>
         <!-- Formulário de criação -->
        <form action="actions/create.php" method="POST" class="form-to_do">
            <input
                type="text"
                name="description"
                placeholder="Add New Tasks"
                required
            />
            <button type="submit" class="form-button">
                <i class="fa-solid fa-plus"></i>
            </button>
        </form>

        <!-- Lista de tarefas -->
        <div id="tasks">
                <div class="tasks">

                    <!-- Checkbox -->
                    <input
                        type="checkbox"
                        class="progress"
                        <?= $t['completed'] ? 'checked' : '' ?>
                    />

                    <!-- Descrição -->
                    <p class="task-description">
                        <?= htmlspecialchars($t['description']) ?>
                    </p>

                    <!-- Ações -->
                    <div class="task-actions">
                        <a href="editar.php?id=<?= $t['id'] ?>" class="editar-button">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        <a href="actions/delete.php?id=<?= $t['id'] ?>" class="delete-button">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </div>

                    <!-- Formulário de edição -->
                    <form action="actions/update.php" method="POST" class="to-do-form edit-tasks">
                        <input type="hidden" name="id" value="<?= $t['id'] ?>">
                        <input
                            type="text"
                            name="description"
                            value="<?= htmlspecialchars($t['description']) ?>"
                            placeholder="Edit your task"
                        />
                        <button type="submit" class="form-button confirm-button">
                            <i class="fa-solid fa-check"></i>
                        </button>
                    </form>

                </div>
        </div>
    </div>
</body>
</html>
