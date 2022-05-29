<?php

require("conexao.php");

$item = $_POST['item'];
$valor = $_POST['preco'];
$preco = str_replace(",",".",$valor);

$stmt = $conn->prepare("INSERT INTO itens (nome,preco) VALUES (?,?)");
$stmt->bind_param("sd", $item, $preco);
$stmt->execute();
$conn->close();
echo ("<script>
        window.alert('Cadastro realizado com Sucesso!')
        window.location.href='novoItem.php';
    </script>");