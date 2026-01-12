<?php
require_once '../database/conexao.php';

$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $sql = $pdo->prepare("DELETE FROM task WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();
}

header("Location: ../index.php");
exit;