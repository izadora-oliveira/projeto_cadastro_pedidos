<!DOCTYPE html>

<?php include("header.php"); ?>

<body>
<?php 
include("navbar.php");
include("manager.php"); 
?>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <h5 class="card-title">Itens</h5>
      <table class="table">
        <thead class="table-light">
            <tr>
            <th scope="col">Código</th>
            <th scope="col">Nome</th>
            <th scope="col">Preço</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $total = 0;
          $itenscarrinho = getItensCarrinho();
          foreach ($itenscarrinho as $item)
          {
            ?>
            <tr>
            <form method="post" action="controller.php">
              <?php
              echo "<td name ='codigo' class='table-Default'>";
              echo "<input type='hidden' name='codigo' id='codigo' value='$item[0]'/>$item[0]";
              echo "</td>";
              echo "<td name='nome' class='table-Default'>";
              echo "<input type='hidden' name='nome' id='nome' value='$item[1]'/>$item[1]";
              echo "</td>";
              echo "<td name='preco' class='table-Default'>";
              echo "<input type='hidden' name='preco' id='preco' />R$ $item[2]";
              echo "</td>";
              echo "<td name='quantidade' class='table-Default'>";
              echo "<input type='hidden' name='quantidade' id='quantidade'value='$item[3]'/>$item[3]";
              echo "</td>";
              echo "<td name='subtotal' class='table-Default'>";
              echo "<input type='hidden' name='subtotal' id='subtotal'value='$item[4]'/>R$ $item[4]";
              echo "</td>";
              echo "<td name='excluir' class='table-Default'>";
              echo "<input type='submit' name='excluir_item_car' value='Excluir' class='btn btn-danger btn-sm'/>";
              echo "</td>";

              $total += $item[4];
              ?> 
            </form>
            </tr>
            <?php
          }
          ?>
          </thead>
        </tbody>
      </table>
      <div>
        <h5 class="card-title">Total R$ <?php echo $total ?></h5>
        <p class="card-text"></p>
      </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Informações Pedido</h5>
        <form method="post" action="controller.php">
          <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name='nome' class="form-control" id="nome">
          </div>
          <div class="mb-3">
            <label for="endereco" class="form-label">Endereço de Entrega</label>
            <input type="text" name='endereco' class="form-control" id="endereco">
          </div>
          <div class="mb-3">
            <label for="dataentrega" class="form-label">Data da Entrega</label>
            <input type="date" name='dataentrega' class="form-control" id="dataentrega">
          </div>
          <div class="mb-3">
            <label for="hora" class="form-label">Horário da Entrega</label>
            <input type="time" name='hora' class="form-control" id="hora">
          </div>
          <div class="mb-3">
            <label for="observacao" class="form-label">Observação</label>
            <input type="text" name='observacao' class="form-control" id="observacao" rows="3"></input>
          </div>
          <input type="submit" name="cadastrar_pedido" value="Cadastrar" class="btn btn-primary btn-sm"/>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>