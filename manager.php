<?php
require("conexao.php");

foreach( $_POST as $nome_campo => $valor)
{ 
   $comando = "$" . $nome_campo . "='" . $valor . "';"; 
   eval($comando); 
}

switch($acao){
    case 'novoItem':
        $preco = str_replace(",",".",$preco);

        $stmt = $conn->prepare("INSERT INTO itens (nome,preco) VALUES (?,?)");
        $stmt->bind_param("sd", $item, $preco);
        $stmt->execute();
        $conn->close();
        echo ("<script>
                window.alert('Cadastro realizado com Sucesso!')
                window.location.href='novoItem.php';
            </script>");            
        break;

    case 'cadastroPedido':
        require("getItensCarrinho.php");

        $data_cadastro = date('Y-m-d');

        $stmt = $conn->prepare("INSERT INTO info_pedido (nome_cli,endereco,data_entrega,hora,obs,data_cadastro) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss",$nome,$endereco,$dataentrega,$hora,$observacao,$data_cadastro);
        $stmt->execute();

        $query_ = "SELECT cod_cli FROM info_pedido where nome_cli = '$nome'";
        $result = $conn->query($query_);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $cod_cli = $row['cod_cli'];
            }
        }

        foreach ($itenscarrinho as $item)
        {

            $stmt = $conn->prepare("INSERT INTO pedidos (cod_cli,cod_produto,nome,preco,quantidade,subtotal) VALUES (?,?,?,?,?,?)");
            $stmt->bind_param("iisdid",$cod_cli,$item[0],$item[1],$item[2],$item[3],$item[4]);
            $stmt->execute();

            $query_ = "DELETE FROM `carrinho` WHERE `codigo` = $item[0] and `quantidade` = $item[3]";
            $result = $conn->query($query_);
        }

        echo ("<script>
                window.alert('Pedido cadastrado com Sucesso!')
                window.location.href='pedidos.php';
            </script>");
        break;
    case 'excluirItemCarrinho':
        $query_ = "DELETE FROM `carrinho` WHERE `codigo` = $codigo and `quantidade` = $quantidade";
        $result = $conn->query($query_);

            echo ("<script>
            window.alert('Excluido com Sucesso!')
            window.location.href='carrinho.php';
            </script>");
        break;
    case 'adicionarItemCarrinho':
        $subtotal = $preco * $quantidade;

        $query_ = "SELECT quantidade,subtotal FROM carrinho where codigo = $codigo";
        $result = $conn->query($query_);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $quantidade += $row['quantidade'];
            $subtotal += $row['subtotal'];

            $stmt = $conn->prepare("UPDATE `carrinho` SET `quantidade`='$quantidade',`subtotal`='$subtotal' WHERE codigo = $codigo");
            $stmt->execute();
            $conn->close();

            echo ("<script>
                    window.alert('Adicionado com Sucesso!')
                    window.location.href='itens.php';
                </script>");
        }else{
            $stmt = $conn->prepare("INSERT INTO carrinho (codigo,nome,preco,quantidade,subtotal) VALUES (?,?,?,?,?)");
            $stmt->bind_param("isdid",$codigo,$nome,$preco,$quantidade,$subtotal);
            $stmt->execute();
            $conn->close();
            echo ("<script>
                    window.alert('Adicionado com Sucesso!')
                    window.location.href='itens.php';
                </script>");
        }
        break;
    case 'deletePedido':
        $query_ = "DELETE FROM `info_pedido` WHERE `cod_cli` = $cod_cli";
        $result = $conn->query($query_);

        $query_ = "DELETE FROM `pedidos` WHERE `cod_cli` = $cod_cli";
        $result = $conn->query($query_);

            echo ("<script>
            window.alert('Pedido Excluido!')
            window.location.href='pedidos.php';
            </script>");
        break;
    case 'excluirItemLista':
        $query_ = "DELETE FROM `itens` WHERE `codigo` = $codigo";
        $result = $conn->query($query_);

            echo ("<script>
            window.alert('Item Excluido!')
            window.location.href='itens.php';
            </script>");
        break;
}