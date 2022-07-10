<!DOCTYPE html>
<html lang="en">

<?php include("header.php") ?>

<body>
<?php include("navbar.php") ?>
    
<div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">Novo Item</h5>

      <form method="post" action="manager.php">
      <div class="mb-3">
        <label for="item" class="form-label">Item</label>
        <input type="text" class="form-control" name ="item" id="item">
      </div>
      <div class="mb-3">
        <label for="preco" class="form-label">Preço</label>
        <input type="double" class="form-control" name ="preco" id="preco">
      </div>
      <input type="submit" name="novo_item" value="Cadastrar" class="btn btn-primary btn-sm"/>
      </form>

    </div>
  </div>
</body>
</html>