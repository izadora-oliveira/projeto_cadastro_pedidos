<?php

require("conexao.php");
require("getItensCarrinho.php");

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$dataentrega = $_POST['dataentrega'];
$hora = $_POST['hora'];
$obs = $_POST['observacao'];

$query_ = "SELECT codigo_cli FROM info_pedidos where nome = $nome";
$result = $conn->query($query_);   
var_dump($result);
die(); 
if ($result !== false && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $codcliente[] = $row['codigo_cli'];
    }
    echo ($codcliente);
    die();
  } else {
    echo ("<script>
          window.alert('Não existe cliente com este nome')
      </script>");
  }

die();

foreach ($itenscarrinho as $item)
{
    $itenscarrinho = explode('#', $item);

    $stmt = $conn->prepare("INSERT INTO pedidos (codigo,nome,preco,quantidade,subtotal) VALUES (?,?,?,?,?)");
    $stmt->bind_param("isdid",$itenscarrinho[0],$itenscarrinho[1],$itenscarrinho[2],$itenscarrinho[3],$itenscarrinho[4]);
    $stmt->execute();
    
}

echo ("<script>
        window.alert('Pedido cadastrado com Sucesso!')
        window.location.href='itens.php';
    </script>");