<?php 
require("getPedidos.php");
$cod_cli = $_POST['cod_cli'];
$lista_itens = array();
$query_ = "SELECT cod_produto,nome FROM pedidos where cod_cli = $cod_cli ORDER BY nome ASC";
$result = $conn->query($query_);
$info_pedido = array();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $lista_itens [$row['cod_produto']] = $row['nome'];
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include "header.php" ?>
<body>
<?php include "navbar.php" ?>

<div class="card" style="width: 30rem;">
  <div class="card-body">
    <h5 class="card-title">Alterar Informações Pedido</h5>
    <form method="post" action="atualizar.php">
        <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Produtos</label>
        <select class="form-select" id="item" name = "item">
            <option selected>Escolha</option>
            <?php 
            foreach($lista_itens as $key => $value)
            {                     
                ?> 
                <option value="<?php $key ?>"><?php echo $value ?></option>
                <?php                    
            }
            ?>           
        </select>
        </div>
        <div class="mb-3">
            <label for="qtd" class="form-label">Quantidade</label>
            <input type="number" class="form-control" id="qtd" name ="qtd">
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" name ="endereco">
        </div>
        <div class="mb-3">
            <label for="dtEntrega" class="form-label">Data Entrega</label>
            <input type="date" class="form-control" id="dtEntrega" name ="dtEntrega">
        </div>
        <div class="mb-3">
            <label for="horaEntrega" class="form-label">Hora entrega</label>
            <input type="time" class="form-control" id="horaEntrega" name ="horaEntrega">
        </div>
        <div class="mb-3">
            <label for="obs" class="form-label">Observação</label>
            <input type="text" class="form-control" id="obs" name ="obs">
        </div>
        
        <button type="submit" class="btn btn-primary">Alterar</button>
    </form>
  </div>
</div>

</body>
</html>