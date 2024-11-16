<?php
session_start();
include_once('config.php'); // Inclua o arquivo de conexão com o banco de dados

// Verifica se o carrinho já está na sessão e o ID do produto foi enviado
if (isset($_POST['id_produto']) && isset($_SESSION['usuario_id'])) {
    $id_produto = $_POST['id_produto'];

    // Remove o produto do carrinho do banco de dados
    $sql = "DELETE FROM carrinho WHERE id_produto = ? AND id_usuario = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ii", $id_produto, $_SESSION['usuario_id']);
    $stmt->execute();

    // Redireciona de volta para o carrinho
    header("Location: carrinho.php");
    exit;
}
?>
