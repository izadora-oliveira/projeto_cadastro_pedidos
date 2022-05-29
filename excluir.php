<?php
require("conexao.php");

$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];

$query_ = "DELETE FROM `carrinho` WHERE `codigo` = $codigo and `quantidade` = $quantidade";
$result = $conn->query($query_);

    echo ("<script>
    window.alert('Excluido com Sucesso!')
    window.location.href='carrinho.php';
    </script>");

