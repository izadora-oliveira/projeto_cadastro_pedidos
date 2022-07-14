<!DOCTYPE html>

<?php include("header.php") ?>

<body>
<?php
include("navbar.php");
include("funcoes.php");
?>

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
            <th scope="col">Adicionar</th>
            <th scope="col">Excluir</th>
            <th scope="col">Alterar</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $itens = getItens();
            foreach ($itens as $item) {
            $itens = explode('#', $item);
        ?>
                <tr>
                <form method="post" action="manager.php">
                  <?php
                    echo "<td name ='codigo' class='table-Default'>";
                    echo "<input type='hidden' name='codigo' id='codigo' value='$itens[0]'/>$itens[0]";
                    echo "</td>";
                    echo "<td name='nome' class='table-Default'>";
                    echo "<input type='hidden' name='nome' id='nome' value='$itens[1]'/>$itens[1]";
                    echo "</td>";
                    echo "<td name='preco' class='table-Default'>";
                    echo "<input type='hidden' name='preco' id='preco' value='$itens[2]'/>R$ $itens[2]";
                    echo "</td>";
                    echo "<td name='quantidade' class='table-Default'>";
                    echo "<input type='number' name='quantidade' id='quantidade'/>";
                    echo "</td>";
                    echo "<td name='adicionar' class='table-Default'>";
                    echo "<input type='submit' name='adicionaCarrinho' value='Adicionar' class='btn btn-success btn-sm'/>";
                    echo "</td>";
                    echo "<td name='excluir' class='table-Default'>";
                    echo "<input type='submit' name='excluir_item' value='Excluir' class='btn btn-danger btn-sm'/>";
                    echo "</td>";
                    echo "<td name='alterar' class='table-Default'>";
                    echo "<a class='btn btn-warning btn-sm' href='alterarItem.php?codigo=$itens[0]&nome=$itens[1]&preco=$itens[2]' role='button'>Alterar</a>";
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