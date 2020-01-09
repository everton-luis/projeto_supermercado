<?php session_start(); ?>
<?php

    include 'config.php';
    include 'header.php';
    include 'classes/controllerProduto.class.php';
    include 'classes/controllerHistoricoVendas.class.php';

    $controllerProdutos = new ControllerProduto();
    $lista_produtos = $controllerProdutos->listarProdutos();

    if(!isset($_SESSION['carrinho'])){
        $_SESSION['carrinho'] = array();
    }

    if(isset($_GET['acao'])){

        if($_GET['acao'] == 'add'){
            $id = intval($_GET['id']);
            if(!isset($_SESSION['carrinho'][$id])){
                $_SESSION['carrinho'][$id] = 1;
            }else{
                $_SESSION['carrinho'][$id] += 1;
            }
        }

        if($_GET['acao'] == 'del'){
            $id = intval($_GET['id']);
            if(isset($_SESSION['carrinho'][$id])){
                unset($_SESSION['carrinho'][$id]);
            }
        }

        if($_GET['acao'] == 'up'){
            if(is_array($_POST['prod'])){
                foreach($_POST['prod'] as $id => $qtd){
                    $id = intval($id);
                    $qtd = intval($qtd);
                    if(!empty($qtd) || $qtd != 0){
                        $_SESSION['carrinho'][$id] = $qtd;
                    }else{
                        unset($_SESSION['carrinho'][$id]);
                    }
                }
            }
        }

    
    }

    if(isset($_POST['enviar'])){
        foreach($_SESSION['carrinho'] as $id => $qtd){
            
            $controllerHistoricoVendas = new ControllerHistoricoVendas();
            $controllerHistoricoVendas->cadastrar($id,$qtd);

            echo "<script>location.href='index.php';</script>";

            unset($_SESSION['carrinho']);

        }
    }


?>

    <div class="content-wrapper">
		<div class="container-fluid">
			
			<div class="row">
				<div class="col-12">
					<h1>Venda</h1>

                    

                    <h4>Produtos</h4>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Preço</th>
                                    <th></th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach($lista_produtos as $lista): ?>
                                    <tr>
                                        <td> <?php echo $lista->getNomeProduto(); ?></td>
                                        <td>R$ <?php echo number_format($lista->getPreco(),2,',','.'); ?></td>
                                        <td><a href="venda.php?acao=add&id=<?php echo $lista->getId(); ?>">Comprar</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    <hr/>

                    <h4>Carrinho de compras</h4>

                    <table border="1">

                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Preço Unitário</th>
                            <th>Preço multiplicado pela quantidade</th>
                            <th>Impostos</th>
                            <th>Subtotal</th>
                            <th>Remover</th>
                    
                        </tr>

                        <form method="POST" action="venda.php?acao=up">

                        <?php

                            $total = 0;
                            $subtotal_impostos = 0;
                            if(count($_SESSION['carrinho']) == 0){
                                echo '<tr>
                                        <td colspan="7">Não há produtos no carrinho</td>

                                    </tr>';
                            }else{
                                foreach($_SESSION['carrinho'] as $id => $qtd){
                                    
                                    $dados_id = $controllerProdutos->getIdCarrinho($id);
                                    $nome = $dados_id['nome_produto'];
                                    $preco = $dados_id['preco'];
                                    
                                    $preco_multiplicado_qtde = $preco * $qtd;
                                    
                                    
                                    $impostos = ($dados_id['porcentagem_imposto'] * 0.01) * $preco * $qtd;
                                    $impostos = round($impostos,2);
                                    $subtotal = ($dados_id['preco'] * $qtd) + $impostos;
                                    $subtotal_impostos += $impostos;
                                    $total += $subtotal;
                                    
                                    echo '<tr>
                                            <td>'.$nome.'</td>
                                            <td><input type="number" name="prod['.$id.']" value="'.$qtd.'" min="0" onchange="this.form.submit()" />
                                            <td>R$'.number_format($preco,2,',','.').'</td>
                                            <td>R$'.number_format($preco_multiplicado_qtde,2,',','.').'</td>
                                            <td>R$'.number_format($impostos, 2 , ',','.').'</td>
                                            <td>R$'.number_format($subtotal,2,',','.').'</td>
                                            <td><a href="venda.php?acao=del&id='.$id.'">Remover</a></td>
                                    
                                          </tr>';

                                    

                                }
                            }
                        ?>
                            
                            <tr>
                                <td colspan="7" style="text-align:right">Total Impostos:R$ <?php echo number_format($subtotal_impostos,2,',','.'); ?></td>
                            </tr>

                            <tr>
                                <td colspan="7" style="text-align:right">Valor Total Compra:R$ <?php echo number_format($total,2,',','.'); ?></td>
                            </tr>

                            <br/>

                            <tr>
                                <td colspan="7" style="text-align:right"><button class="btn btn-primary" type="submit" name="enviar">Finalizar Pedido</td></button>
                            </tr>

                            </form>

                    </table>


					
				</div>
			</div>
        </div>

<?php

    include 'footer.php';

?>