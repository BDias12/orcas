<?php

require __DIR__ . "/../config.php";

$sql = "SELECT * FROM categorias_receita"; #consulta no banco
$sql = $pdo->prepare($sql); #prepara o comando
$sql->execute(); #executa o comando

$categorias = $sql->fetchAll(PDO::FETCH_ASSOC); #guarda na variavel categorias o array retornado do banco

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./adicionar.php" method="POST">
        <input type="text" name="descricao" placeholder="Adicione uma categoria">
        <button type="submit">Enviar</button>
    </form>
    <table>
        <thead>
        <tr>
        <th>
            <td>#</td>
            <td>Descrição</td>
        </th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($categorias as $categoria): ?>
            <tr>
                <th>
                <td><?=$categoria["id"]?></td>
                <td><?=$categoria["descricao"]?></td>
                <td><a href="./remover.php?excluir=<?=$categoria["id"]?>">Excluir</a></td>
                <?php endforeach; ?>
            </tr>
        </tbody>
    </table>
</body>
</html>