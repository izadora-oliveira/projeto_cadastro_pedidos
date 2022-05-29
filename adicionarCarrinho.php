<?php

require("conexao.php");

$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];
$subtotal = $preco * $quantidade;

$stmt = $conn->prepare("INSERT INTO carrinho (codigo,nome,preco,quantidade,subtotal) VALUES (?,?,?,?,?)");
$stmt->bind_param("isdid",$codigo,$nome,$preco,$quantidade,$subtotal);
$stmt->execute();
$conn->close();
echo ("<script>
        window.alert('Adicionado com Sucesso!')
        window.location.href='itens.php';
    </script>");