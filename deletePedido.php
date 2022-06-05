<?php
require("conexao.php");

$cod_cli = $_POST['cod_cli'];

$query_ = "DELETE FROM `info_pedido` WHERE `cod_cli` = $cod_cli";
$result = $conn->query($query_);

$query_ = "DELETE FROM `pedidos` WHERE `cod_cli` = $cod_cli";
$result = $conn->query($query_);

    echo ("<script>
    window.alert('Pedido Excluido!')
    window.location.href='pedidos.php';
    </script>");

