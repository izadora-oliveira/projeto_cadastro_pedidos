<!DOCTYPE html>

<?php include("header.php") ?>

<body>
<?php include("navbar.php") ?>
    
<div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">Alterar Item</h5>

      <form method="post" action="controller.php">
      <div class="mb-3">
        <label for="item" class="form-label">Código</label>
        <input type="number" class="form-control" name="codigo" value="<?php echo $_GET['codigo'] ?>" readonly="readonly" />
      </div>
      <div class="mb-3">
        <label for="item" class="form-label">Nome</label>
        <input type="text" class="form-control" name ="nome" id="item" value="<?php echo $_GET['nome'] ?>">
      </div>
      <div class="mb-3">
        <label for="preco" class="form-label">Preço</label>
        <input type="double" class="form-control" name ="preco" id="preco" value="<?php echo $_GET['preco'] ?>">
      </div>
      <input type="submit" name="alterar_item" value="Alterar" class="btn btn-primary btn-sm"/>
      </form>

    </div>
  </div>
</body>
</html>

