<?php

    include 'config.php';
    include 'header.php';
    include 'classes/controllerProduto.class.php';

    $controllerProdutos = new ControllerProduto();
    $lista_produtos = $controllerProdutos->listarProdutos();

?>

    <div class="content-wrapper">
		<div class="container-fluid">
			
			<div class="row">
				<div class="col-12">
					<h1>Produtos</h1>

                    <a href="cadastrar_produtos.php" class="btn btn-primary" role="button">Cadastrar Produto</a>

                    <br/><br/>

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nome Produto</th>
                                <th>Marca</th>
                                <th>Preço</th>
                                <th>Descrição</th>
                                <th>Nome tipo produto</th>
                                <th>Porcentagem Imposto %</th>
                                <th>Ações</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($lista_produtos as $lista): ?>

                                <tr>
                                    <td><?php echo $lista->getNomeProduto(); ?>
                                    <td><?php echo $lista->getMarca(); ?>
                                    <td><?php echo 'R$ '.number_format($lista->getPreco(),2,',','.'); ?>
                                    <td><?php echo $lista->getDescricao(); ?>
                                    <td><?php echo $lista->getNomeTipoProduto(); ?>
                                    <td><?php echo $lista->getPorcentagemImposto(); ?>
                                    <td width="350">
                                        <a href="atualizar_produtos.php?id=<?php echo $lista->getId(); ?>" class="btn btn-primary" role="button">Atualizar</a>
                                        -
                                        <a href="deletar_produtos.php?id=<?php echo $lista->getId(); ?>" class="btn btn-danger" role="button" onclick="return confirm('tem certeza que deseja deletar <?php echo $lista->getNomeProduto(); ?> ?')">Deletar</a>
                                    </td>

                                </tr>
                                


                            <?php endforeach; ?>
                        </tbody>

                    </table>

					
				</div>
			</div>
        </div>

<?php

    include 'footer.php';

?>