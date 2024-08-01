<?php
session_start();

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    include_once('config.php');

    $email = $_POST['email'];
    $senha = $_POST['senha']; 


    // Prepare a declaração SQL protegida contra injeção SQL
    $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows  < 1) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: form.php');
        exit;
    } else {
        // Não armazene a senha na sessão
        $_SESSION['email'] = $email;
        header('Location: sistema.php');
        exit;
    }

    $stmt->close();
} else {
    // Não acessa
    header('Location: form.php');
    exit;
}
?>