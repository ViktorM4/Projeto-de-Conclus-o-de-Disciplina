<?php
require_once 'classecliente.php';
if (isset($_GET['id'])) {
    $cliente = new Cliente();
    $cliente->excluir($_GET['id']);
}
header("Location: index.php");
exit;
?>
