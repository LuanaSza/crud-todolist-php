<?php
require_once '../database/conexao.php';

$description = filter_input(INPUT_POST, 'description');

if ($description) {
    $sql = $pdo->prepare("INSERT INTO task (description, completed) VALUES (:description, false)");
    $sql->bindValue(':description', $description);
    $sql->execute();
}

header("Location: ../index.php");
exit;