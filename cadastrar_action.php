<?php

require './configs/config.php';

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');
$senha = filter_input(INPUT_POST, 'senha');

$sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
$sql->bindValue(':nome', $nome);
$sql->bindValue(':email', $email);
$sql->bindValue(':senha', $senha);

$sql->execute();

header("Location: index.php");

?>