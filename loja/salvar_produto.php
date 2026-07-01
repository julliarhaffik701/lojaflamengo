<?php
session_start();
include("conecta.php");

if (!isset($_SESSION['id_usuario']) || $_SESSION['categoria'] != 'administrador') {
    header("Location: index.php");
    exit;
}

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = str_replace(",", ".", $_POST['preco']);
$imagem = $_POST['imagem'];

$sql = "INSERT INTO produtos (nome, descricao, preco, imagem)
VALUES ('$nome', '$descricao', '$preco', '$imagem')";

mysqli_query($conexao, $sql);

header("Location: listar_produtos.php");
?>