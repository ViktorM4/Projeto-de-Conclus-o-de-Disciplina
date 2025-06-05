<?php

require 'classecliente.php';
$cliente = new Cliente();
if (isset($_GET['id'])) {
    $cliente->consultar($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Cliente</title>
</head>
<body>
    <h1>Cadastro de Cliente</h1>
    <form method="post" action="salvar1.php">
        <input type="hidden" name="id" value="<?= $cliente->getId() ?>">
        <label>Data de Nascimento: <input type="date" name="data" value="<?= $cliente->getDataNascimento() ?>" required></label><br>
        <label>Nome: <input type="text" name="nome" value="<?= $cliente->getNome() ?>" required></label><br>
        <label>Email: <input type="email" name="email" value="<?= $cliente->getEmail() ?>" required></label><br>
        <label>Telefone: <input type="text" name="telefone" value="<?= $cliente->getTelefone() ?>"></label><br>
        <label>CPF: <input type="text" name="cpf" value="<?= $cliente->getCpf() ?>" required></label><br>
        <input type="submit" value="Salvar">
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>
