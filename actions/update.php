<?php
require_once '../database/conexao.php';

$id = filter_input(INPUT_POST, 'id');
$description = filter_input(INPUT_POST, 'description');

if ($id && $description) {
    $sql = $pdo->prepare("UPDATE task SET description = :description WHERE id = :id");
    $sql->bindValue(':description', $description);
    $sql->bindValue(':id', $id);
    $sql->execute();
}

header("Location: ../index.php");
exit;