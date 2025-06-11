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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Cadastro de Cliente</h1>
    <form method="post" action="salvar1.php">
        <input type="hidden" name="id" value="<?= $cliente->getId() ?>">
        
        <label>Nome:
            <input type="text" name="nome" value="<?= $cliente->getNome() ?>" required>
        </label>
        
        <label>Email:
            <input type="email" name="email" value="<?= $cliente->getEmail() ?>" required>
        </label>
        
        <label>Telefone:
            <input type="text" name="telefone" value="<?= $cliente->getTelefone() ?>">
        </label>
        
        <label>CPF:
            <input type="text" name="cpf" value="<?= $cliente->getCpf() ?>" required>
        </label>
        
        <label>Data de Nascimento:
            <input type="date" name="data" value="<?= $cliente->getDataNascimento() ?>" required>
        </label>
        
        <input type="submit" value="Salvar">
        <a href="index.php"><button type="button">Voltar</button></a>
    </form>
</body>
</html>
