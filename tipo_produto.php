<?php

	include 'config.php';
	include 'header.php';
	include 'classes/controllerTipoProduto.class.php';

	$controllerTipoProduto = new ControllerTipoProduto();
	$lista_tipo_produto = $controllerTipoProduto->listarTipoProduto();  

?>

    <div class="content-wrapper">
		<div class="container-fluid">
			
			<div class="row">
				<div class="col-12">
                    <h1>Tipo Produto</h1>
                    
                    <a href="cadastrar_tipo_produto.php" class="btn btn-primary" role="button">Cadastrar Tipo Produto</a>

                    <br/><br/>

					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Nome Tipo Produto</th>
								<th scope="col">Porcentagem Imposto %</th>
								<th scope="col">Ações</th>
							</tr>
						</thead>

						<tbody>
							
								<?php foreach($lista_tipo_produto as $lista): ?>
									<tr>
										<td><?php echo $lista->getId(); ?></td>
										<td><?php echo $lista->getNomeTipoProduto(); ?></td>
										<td><?php echo str_replace(".",",",$lista->getPorcentagemTipoProduto()); ?></td>
										<td>
											<a href="atualizar_tipo_produto.php?id=<?php echo $lista->getId(); ?>" class="btn btn-primary" role="button">Atualizar</a>
											-
											<a href="deletar_tipo_produto.php?id=<?php echo $lista->getId(); ?>" class="btn btn-danger" role="button" onclick="return confirm('tem certeza que deseja deletar <?php echo $lista->getNomeTipoProduto(); ?>  ?')">Deletar</a>

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