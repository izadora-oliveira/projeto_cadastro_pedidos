<!doctype html>
<html lang="pt-br">

  <?php include("header.php"); ?>

  <body>
  <?php include("navbar.php"); ?> 
  
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">Novo Pedido</h5>

      <form method="post" action="cadastroController.php">
      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome">
      </div>
      <div class="mb-3">
        <label for="endereco" class="form-label">Endereço de Entrega</label>
        <input type="text" class="form-control" id="endereco">
      </div>
      <div class="mb-3">
        <label for="observacao" class="form-label">Observação</label>
        <textarea class="form-control" id="observacao" rows="3"></textarea>
      </div>

      <button type="submit" class="btn btn-primary btn-sm">Cadastrar</button>
      </form>

    </div>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>