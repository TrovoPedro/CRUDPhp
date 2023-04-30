<?php

require './configs/config.php';

$usuario = [];
$id = filter_input(INPUT_GET, 'id');

if($id){
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0){
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);
    }else{
        header("Location: index.php");
        exit;
    }
}else{
    header("Location: index.php");
}

?>

<h1>Editar usuario</h1>
<form action="editar_action.php" method="post">
    <input type="hidden" name="id" value="<?=$usuario['id'];?>">
    <label>
       Email: <input type="text" name="email" value="<?=$usuario['email'];?>">
    </label>
    <label>
       Senha: <input type="password" name="senha" value="<?=$usuario['senha'];?>">
    </label>
    <input type="submit" value="Atualizar">
</form>