<?php

require './configs/config.php';

$lista = [];
$sql = $pdo->query("SELECT * FROM usuarios");

if ($sql->rowCount() > 0) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>

<h1>Listagem de Usuarios </h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Senha</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($lista as $usuario): ?>
        <tr>
            <td><?=$usuario['id'];?></td>
            <td><?=$usuario['nome'];?></td>
            <td><?=$usuario['email'];?></td>
            <td><?=$usuario['senha'];?></td>
            <td>
                <a href="editar.php?id=<?=$usuario['id'];?>">[ Editar ]</a>
                <a href="excluir.php?id=<?=$usuario['id'];?>">[ Excluir ]</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="cadastrar.php">Cadastrar usuarios</a>