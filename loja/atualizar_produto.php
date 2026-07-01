<?php
session_start();
include("conecta.php");

if (!isset($_SESSION['id_usuario']) || $_SESSION['categoria'] != 'administrador') {
    header("Location: index.php");
    exit;
}

$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = str_replace(",", ".", $_POST['preco']);
$imagem = $_POST['imagem'];

$sql = "UPDATE produtos SET
nome = '$nome',
descricao = '$descricao',
preco = '$preco',
imagem = '$imagem'
WHERE id_produto = '$id'";

mysqli_query($conexao, $sql);

header("Location: listar_produtos.php");
?>