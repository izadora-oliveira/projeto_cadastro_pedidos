<?php

require("conexao.php");

$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];

$stmt = $conn->prepare("INSERT INTO itens (codigo,nome,preco,quantidade) VALUES (?,?,?,?)");
$stmt->bind_param("isdi",$codigo,$item,$preco,$quantidade);
$stmt->execute();
$conn->close();
echo ("<script>
        window.alert('Cadastro realizado com Sucesso!')
        window.location.href='novoItem.php';
    </script>");