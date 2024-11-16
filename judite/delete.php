<?php
session_start();
include_once('config.php');

if (!empty($_GET['id_usuario'])) {
    $id_usuario = mysqli_real_escape_string($conexao, $_GET['id_usuario']);

    // Prepare the SELECT query
    $sqlSelect = "SELECT * FROM usuarios WHERE id_usuario=?";
    $stmtSelect = $conexao->prepare($sqlSelect);
    $stmtSelect->bind_param("i", $id_usuario);

    // Execute the SELECT query
    if ($stmtSelect->execute()) {
        $result = $stmtSelect->get_result();

        if ($result->num_rows > 0) {
            // Prepare the DELETE query
            $sqlDelete = "DELETE FROM usuarios WHERE id_usuario=?";
            $stmtDelete = $conexao->prepare($sqlDelete);
            $stmtDelete->bind_param("i", $id_usuario);

            // Execute the DELETE query
            if ($stmtDelete->execute()) {
                echo "Cliente deletado com sucesso!";
            } else {
                echo "Erro ao deletar cliente: " . $stmtDelete->error;
            }
        } else {
            echo "Cliente não encontrado.";
        }
    } else {
        echo "Erro ao executar a consulta SELECT: " . $stmtSelect->error;
    }

    // Close statements
    $stmtSelect->close();
    $stmtDelete->close();
}

header('Location: lista_cliente.php');
?>