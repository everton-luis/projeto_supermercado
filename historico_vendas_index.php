<?php

	include 'config.php';
	include 'header.php';
	include 'classes/controllerHistoricoVendas.class.php';

	$controllerHistoricoVendas = new ControllerHistoricoVendas();
	$lista_historico_vendas = $controllerHistoricoVendas->listaHistoricoVendas();

?>

    <div class="content-wrapper">
		<div class="container-fluid">
			
			<div class="row">
				<div class="col-12">
					<h1>Historico Vendas</h1>

					<table class="table">

						<thead class="thead-dark">
							<tr>
								<th>Nome Produto</th>
								<th>Quantidade</th>
								<th>Data Pedido</th>
							</tr>

						</thead>
						<tbody>
							<?php foreach($lista_historico_vendas as $lista): ?>
								<tr>
									<td><?php echo $lista->getNomeProduto(); ?></td>
									<td><?php echo $lista->getQuantidade(); ?></td>
									<td><?php echo date('d/m/Y', strtotime($lista->getDataPedido())); ?>
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