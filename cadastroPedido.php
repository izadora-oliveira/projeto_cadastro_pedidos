<?php

require("conexao.php");
require("getItensCarrinho.php");

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$dataentrega = $_POST['dataentrega'];
$hora = $_POST['hora'];
$obs = $_POST['observacao'];
$data_cadastro = date('Y-m-d');

$stmt = $conn->prepare("INSERT INTO info_pedido (nome_cli,endereco,data_entrega,hora,obs,data_cadastro) VALUES (?,?,?,?,?,?)");
$stmt->bind_param("ssssss",$nome,$endereco,$dataentrega,$hora,$obs,$data_cadastro);
$stmt->execute();

$query_ = "SELECT cod_cli FROM info_pedido where nome_cli = '$nome'";
$result = $conn->query($query_);

if ($result->num_rows > 0)
{
  while ($row = $result->fetch_assoc())
  {
    $cod_cli = $row['cod_cli'];
  }
}

foreach ($itenscarrinho as $item)
{
    $itenscarrinho = explode('#', $item);

    $stmt = $conn->prepare("INSERT INTO pedidos (cod_cli,cod_produto,nome,preco,quantidade,subtotal) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("iisdid",$cod_cli,$itenscarrinho[0],$itenscarrinho[1],$itenscarrinho[2],$itenscarrinho[3],$itenscarrinho[4]);
    $stmt->execute();

    $query_ = "DELETE FROM `carrinho` WHERE `codigo` = $itenscarrinho[0] and `quantidade` = $itenscarrinho[3]";
    $result = $conn->query($query_);
}

echo ("<script>
        window.alert('Pedido cadastrado com Sucesso!')
        window.location.href='pedidos.php';
    </script>");