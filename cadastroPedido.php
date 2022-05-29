<?php

require("conexao.php");

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$dataentrega = $_POST['dataentrega'];
$hora = $_POST['hora'];
$observacao = $_POST['observacao'];

echo $dataentrega.'   '.$hora;
die();

$stmt = $conn->prepare("INSERT INTO info_pedidos (nome,endereco,dataentrega,hora,observacao) VALUES (?,?,?,?,?)");
$stmt->bind_param("sssss",$nome,$endereco,$dataentrega,$hora,$observacao);
$stmt->execute();
$conn->close();
echo ("<script>
        window.alert('Pedido cadastrado com Sucesso!')
        window.location.href='itens.php';
    </script>");