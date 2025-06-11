<?php
require 'classecliente.php';
$clientes = Cliente::listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
</head>
<body>
    <h1>Clientes</h1>
    <a href="cliente.php">Novo Cliente</a>
    <table border=1>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>CPF</th>
            <th>Data Nascimento</th>
            <th>Ações</th>
        </tr>

        <?php if (is_array($clientes) && count($clientes) > 0): ?>
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?= htmlspecialchars($cliente['IDCLIENTE'] ?? '') ?></td>
                    <td><?= htmlspecialchars($cliente['NOME'] ?? '') ?></td>
                    <td><?= htmlspecialchars($cliente['EMAIL'] ?? '') ?></td>
                    <td><?= htmlspecialchars($cliente['TELEFONE'] ?? '') ?></td>
                    <td><?= htmlspecialchars($cliente['CPF'] ?? '') ?></td>
                    <td><?= htmlspecialchars($cliente['DATA_NASCIMENTO'] ?? '') ?></td>
                    <td>
                        <a href="cliente.php?id=<?= htmlspecialchars($cliente['IDCLIENTE']) ?>">Editar</a>
                        <a href="excluir.php?id=<?= htmlspecialchars($cliente['IDCLIENTE']) ?>" onclick="return confirm('Confirma a exclusão?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">Nenhum cliente cadastrado.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>