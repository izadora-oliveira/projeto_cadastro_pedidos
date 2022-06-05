<?php

require("conexao.php");

$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];
$subtotal = $preco * $quantidade;

$query_ = "SELECT quantidade,subtotal FROM carrinho where codigo = $codigo";
$result = $conn->query($query_);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $quantidade += $row['quantidade'];
    $subtotal += $row['subtotal'];

    $stmt = $conn->prepare("UPDATE `carrinho` SET `quantidade`='$quantidade',`subtotal`='$subtotal' WHERE codigo = $codigo");
    $stmt->execute();
    $conn->close();

    echo ("<script>
            window.alert('Adicionado com Sucesso!')
            window.location.href='itens.php';
        </script>");
}else{
    $stmt = $conn->prepare("INSERT INTO carrinho (codigo,nome,preco,quantidade,subtotal) VALUES (?,?,?,?,?)");
    $stmt->bind_param("isdid",$codigo,$nome,$preco,$quantidade,$subtotal);
    $stmt->execute();
    $conn->close();
    echo ("<script>
            window.alert('Adicionado com Sucesso!')
            window.location.href='itens.php';
        </script>");

}

