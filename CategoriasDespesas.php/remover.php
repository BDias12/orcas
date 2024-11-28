<?php

require __DIR__ . "/../config.php";

if (empty($_POST["excluir"])){
    header("Location: ./listar.php");
}

$excluir = $_GET["excluir"];

$sql = "DELETE FROM categorias_despesa WHERE (:excluir = id)";
$sql = $pdo->prepare($sql);
$sql->bindValue(":excluir", $excluir);
$sql->execute();

header("Location: ./listar.php");
exit;

?>