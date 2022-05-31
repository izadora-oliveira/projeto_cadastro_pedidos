<?php
require("conexao.php");
$query_ = "SELECT * FROM info_pedidos ";
$result = $conn->query($query_);
$info_pedido = array();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $info_pedido[] = $row['cod_cli'] . '#' . $row['nome'] . "#" . $row['endereco']. "#" . $row['data_entrega']. "#" . $row['hora']. "#" . $row['obs'];
  }
}

$produtos = array();
foreach($info_pedido as $info){
    $info_pedido = explode('#', $info);
    $cod_cli = $info_pedido[0];
    $query_ = "SELECT nome,preco,quantidade,subtotal FROM pedidos where cod_cli = $cod_cli";
    $res = $conn->query($query_);
    if ($res->num_rows > 0) {
      while ($row = $res->fetch_assoc()) {
        $produtos[$cod_cli] = $row['nome'] . "#" . $row['preco']. "#" . $row['quantidade']. "#" . $row['subtotal'];
      }
    }
}


