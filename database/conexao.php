<?php
$hostname = "localhost";
$database = "to_do_list";
$password = "Password";

try {
    $pdo = new PDO(
        "pgsql:host={$hostname};port=5432;dbname={$database}",
        "postgres",
        $password
    );

    // Dispara exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Só mostra erro se a conexão falhar
    echo "Erro de conexão: " . $e->getMessage();
}