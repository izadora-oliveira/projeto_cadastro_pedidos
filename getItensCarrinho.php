<?php
require("conexao.php");
$query_ = "SELECT * FROM carrinho ";
$result = $conn->query($query_);
$itenscarrinho = array();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $itenscarrinho[] = $row['codigo'] . '#' . $row['nome'] . "#" . $row['preco']. "#" . $row['quantidade']. "#" . $row['subtotal'];
  }
} else {

  echo ("<script>
        window.alert('Você não possui itens cadastrados.')
    </script>");
}
$conn->close();