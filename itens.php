<!DOCTYPE html>
<html lang="pt-br">

<?php include("header.php") ?>

<body>
<?php
include("navbar.php");
require "getItens.php";
?>

<div class="card" style="width: 40rem;">
    <div class="card-body">
      <h5 class="card-title">Itens</h5>
        <table class="table">
        <thead class="table-light">
            <tr>
            <th scope="col">Código</th>
            <th scope="col">Nome</th>
            <th scope="col">Preço</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Adicionar</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $cont = 0;
            foreach ($itens as $item) {
            $itens = explode('#', $item);
        ?>
                <tr>
                <form method="post" action="adicionarCarrinho.php">
                  <?php
                    echo "<td name ='codigo' class='table-Default'>";
                    echo "<input type='hidden' name='codigo' id='codigo' value='$itens[0]'/>$itens[0]";
                    echo "</td>";
                    echo "<td name='nome' class='table-Default'>";
                    echo "<input type='hidden' name='nome' id='nome' value='$itens[1]'/>$itens[1]";
                    echo "</td>";
                    echo "<td name='preco' class='table-Default'>";
                    echo "<input type='hidden' name='preco' id='preco' value='$itens[2]'/>$itens[2]";
                    echo "</td>";
                    echo "<td name='quantidade' class='table-Default'>";
                    echo "<input type='number' name='quantidade' id='quantidade'/>";
                    echo "</td>";
                    echo "<td name='adicionar' class='table-Default'>";
                    echo "<button type='submit' class='btn btn-success btn-sm'>Adicionar</button>";
                    echo "</td>";
                    ?> 
                    </form>
                    </tr>
                    <?php
                    }
                  ?>
                </thead>
        </tbody>
        </table>
    </div>
  </div>
    
</body>
</html>