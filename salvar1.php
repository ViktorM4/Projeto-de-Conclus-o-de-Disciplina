<?php
require 'classecliente.php'; 

$id = isset($_POST['id']) ? $_POST['id'] : null;

$cliente = new Cliente();

    $cliente->setNome(trim($_POST['nome']));
    $cliente->setEmail(trim($_POST['email']));
    $cliente->setTelefone(trim($_POST['telefone']));
    $cliente->setCpf(trim($_POST['cpf']));
    $cliente->setDataNascimento(trim($_POST['data']));

    if (!empty($id)) {
        $cliente->setId((int)$id); 
        if ($cliente->alterar()) {
            $sucesso = true;
            $mensagem = "Cliente atualizado com sucesso!";
        } else {
            $mensagem = "Erro ao atualizar cliente.";
        }
    } else {
        if ($cliente->inserirCliente()) {
            $sucesso = true;
            $mensagem = "Cliente cadastrado com sucesso!";
        } else {
            $mensagem = "Erro ao cadastrar cliente.";
        }
    }

    echo "<p><a href='index.php'>Voltar para a lista de clientes</a></p>";

?>