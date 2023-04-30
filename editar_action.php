<?php

require './configs/config.php';

$id = filter_input(INPUT_POST, 'id');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha');

if($id && $email && $senha){
    $sql = $pdo->prepare("UPDATE usuarios SET email = :email, senha = :senha WHERE id = :id");
    $sql->bindValue(':email', $email);
    $sql->bindValue(':senha', $senha);
    $sql->bindValue(':id', $id);
    $sql->execute();

    header("Location: index.php");
    exit;
}else{
    header("Location: index.php");
    exit;
}

?>