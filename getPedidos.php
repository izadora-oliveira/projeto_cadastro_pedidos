<?php
require("conexao.php");

$info_cli = array();
$query_ = "SELECT * FROM info_pedido ORDER BY data_entrega ASC";
$result = $conn->query($query_);
$info_pedido = array();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    
    $info_cli []= [$row['cod_cli'],$row['nome_cli'],$row['endereco'],$row['data_entrega'],$row['hora'],$row['obs'],$row['data_cadastro']];
  }
}

$produtos = array();
$cod_cli = $info_cli[0][0];
$query_ = "SELECT * FROM pedidos ";
$result = $conn->query($query_);
$itens = array();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $produtos[] = [$row['cod_cli'],$row['cod_produto'],$row['nome'],$row['preco'],$row['quantidade'],$row['subtotal']];
  }
}