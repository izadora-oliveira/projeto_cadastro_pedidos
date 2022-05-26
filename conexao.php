<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "organizadorPedidos");

if ($conn->connect_error) {
  die("Erro Conexão: " . $conn->connect_error);
}