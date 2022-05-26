<?php
require("conexao.php");
$query_ = "SELECT * FROM itens ";
$result = $conn->query($query_);
$itens = array();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $itens[] = $row['codigo'] . '#' . $row['nome'] . "#" . $row['preco'];
  }
} else {

  echo ("<script>
        window.alert('Você não possui itens cadastrados.')
    </script>");
}
$conn->close();