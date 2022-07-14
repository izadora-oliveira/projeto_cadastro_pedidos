<?php

function getItens(){
    require("conexao.php");

    $query_ = "SELECT * FROM itens ";
    $result = $conn->query($query_);
    $itens = array();
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $itens[] = $row['cod_produto'] . '#' . $row['nome'] . "#" . $row['preco'];
      }
    } else {
    
      echo ("<script>
            window.alert('Você não possui itens cadastrados.')
        </script>");
    }
    $conn->close();
    return $itens;
}

function getItensCarrinho(){
    require("conexao.php");
    $query_ = "SELECT * FROM carrinho ";
    $result = $conn->query($query_);
    $itenscarrinho = array();
    if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $itenscarrinho[] = [$row['codigo'],$row['nome'],$row['preco'],$row['quantidade'],$row['subtotal']];
    }
    } else {

    echo ("<script>
            window.alert('Você não possui itens cadastrados.')
        </script>");
    }
    return $itenscarrinho;
}

function getPedidos(){
    require("conexao.php");

    $pedidos = array();
    $info_cli = array();
    $query_ = "SELECT * FROM info_pedido ORDER BY data_entrega ASC";
    $result = $conn->query($query_);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            
            $info_cli []= [$row['cod_cli'],$row['nome_cli'],$row['endereco'],$row['data_entrega'],$row['hora'],$row['obs'],$row['data_cadastro']];
        }

        $pedidos[0] = $info_cli;
        $produtos = array();
        $query_   = "SELECT * FROM pedidos ";
        $result   = $conn->query($query_);
        while ($row = $result->fetch_assoc())
        {
            $produtos[] = [$row['cod_cli'],$row['cod_produto'],$row['nome'],$row['preco'],$row['quantidade'],$row['subtotal']];
        }
    
    } else {
        echo ("<script>
                window.alert('Você não possui Pedidos cadastrados.')
            </script>");
    }

    $pedidos[1] = $produtos;
    return $pedidos;
}