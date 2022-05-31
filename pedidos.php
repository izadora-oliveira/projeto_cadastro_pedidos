<!DOCTYPE html>
<html lang="pt-br">

<?php include("header.php") ?>

<body>
<?php
include("navbar.php");
require "getPedidos.php";
?>

<div class="card" style="width: 40rem;">
    <div class="card-body">
      <h5 class="card-title">Pedidos</h5>
        <table class="table">
        <thead class="table-light">
            <tr>
            <th scope="col">Nome</th>
            <th scope="col">Endereço</th>
            <th scope="col">Data</th>
            <th scope="col">Hora</th>
            <th scope="col">Observação</th>
            </tr>
        </thead>
        <tbody>
        <?php
        
            foreach ($info_pedido as $info) {
            $info_pedido = explode('#',$info);
            echo"<pre>";
            var_dump($info_pedido);
        
        ?>
                <tr>
                   
                    </tr>
                    <?php
                }
                die();
                  ?>
                </thead>
        </tbody>
        </table>
    </div>
  </div>
    
</body>
</html>