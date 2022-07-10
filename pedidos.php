<!DOCTYPE html>
<html lang="pt-br">
<?php 
include("header.php");
include("funcoes.php");
?>
<body>
<?php
include("navbar.php");
$i=0;
$pedidos = getPedidos();
$info_cli = $pedidos[0];
foreach($info_cli as $cli){
?>
<div class="accordion" id="accordionExample">
    <div class="accordion-item">
    <h2 class="accordion-header" id="heading<?php echo $i; ?>">
        <button class="accordion-button <?php echo ($i>0) ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i; ?>" aria-expanded="<?php echo ($i==0) ? 'true' : 'false'; ?>" aria-controls="collapse<?php echo $i; ?>">
            <?php echo $cli[1]; ?>
        </button>
    </h2>
    <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse <?php echo ($i==0) ? 'show' : ''; ?>" aria-labelledby="heading<?php echo $i; ?>" data-bs-parent="#accordionExample">
        <div class="accordion-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Produtos</h5>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $total = 0;
                            $produtos = $pedidos[1];
                            foreach($produtos as $produto){
                                ?> 
                                <tr>
                                    <?php
                                    if($produto[0] == $cli[0])
                                    {
                                        foreach($produto as $key => $value)
                                        { 
                                            if ($value != $cli[0]){
                                            ?> 
                                            <td><?php $key == 3 || $key == 5 ? print "R$ ".$value : print $value ?></td>
                                            <?php
                                            if ($key == 5){
                                                $total += $value;
                                            }
                                            }
                                        }
                                    }
                                    ?>
                                </tr>
                                <?php
                            } 
                            ?>
                        </tbody>
                    </table>
                    <div>
                        <h5 class="card-title">Total <?php echo $total ?></h5>
                        <p class="card-text"></p>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informações</h5>
                    <ol class="list-group list-group-numbered">
                        <?php
                        $titulos = ['Nome','Endereço','Data Entrega','Hora Entrega','Observação','Data Cadastro'];
                        $info = $cli;
                        array_splice($info,0,1);
                        foreach($info as $key => $value){
                            ?> 
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold"><?php echo $titulos[$key] ?></div>
                                <?php echo $value ?>
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                    </ol>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <form method="post" action="manager.php">
                        <input type='hidden' name='cod_cli' id='cod_cli' value='<?php echo $cli[0] ?>'/>
                        <input type='submit' name='deletePedido' value='Excluir' class='btn btn-danger btn-sm'/>
                        </form>
                    </div>
                </div>
                </div>
        </div>
        </div>
    </div>
    </div>
</div>
<?php
$i++;
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>