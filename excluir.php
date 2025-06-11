<?php 
require 'classecliente.php';

$cliente = new Cliente();
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    try {
        if ($cliente->excluir($id)) {
            echo "Cliente excluído com sucesso!";
        } else {
            echo "Erro ao excluir cliente.";
        }
    } catch (PDOException $e) {
        echo "Erro ao excluir cliente: " . $e->getMessage();
    }
} else {
    echo "ID não fornecido.";
}
?>
<br>
<a href="index.php"><button>Voltar para a lista de clientes</button></a>