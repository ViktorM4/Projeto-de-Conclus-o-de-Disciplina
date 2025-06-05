<?php
if (file_exists('classecliente.php')) {
    require_once 'classecliente.php';
} else {
    die('Error: Required file classecliente.php is missing.');
$nome = filter_input(INPUT_POST, 'NOME', FILTER_SANITIZE_STRING);
if ($nome && strlen($nome) <= 100) { // Example validation: max length 100
    $cliente->setNome($nome);
} else {
    // Handle invalid input, e.g., redirect or show an error
if (filter_var($_POST['EMAIL'], FILTER_VALIDATE_EMAIL)) {
    $cliente->setEmail($_POST['EMAIL']);
} else {
    die('Error: Invalid email format.');
}
    exit;
}

$cliente = new Cliente();

$cliente->setNome($_POST['NOME']);
$cliente->setEmail($_POST['EMAIL']);
$cliente->setTelefone($_POST['TELEFONE']);
$cliente->setCpf($_POST['CPF']);
$cliente->setDataNascimento($_POST['DATA_NASCIMENTO']);

if (!empty($_POST['id'])) {
    $cliente->setId($_POST['id']);
    $cliente->alterar();
}


header("Location: index.php");
exit;