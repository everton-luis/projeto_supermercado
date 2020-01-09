<?php

    include 'config.php';
    include 'header.php';
    include 'classes/controllerTipoProduto.class.php';

    $controllerTipoProduto = new ControllerTipoProduto();
    $lista_tipo_produto = $controllerTipoProduto->listarTipoProduto();


?>

    <script src="js/jquery-1.11.1.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script type="text/javascript">
        $("#preco").mask("#.##0,00", {reverse: true})
    </script>

    <div class="content-wrapper">
		<div class="container-fluid">
			
			<div class="row">
				<div class="col-12">
					<h1>Cadastrar Produtos</h1>

                    <form method="POST" action="cadastrar_produtos_submit.php">

                        <div class="form-group row">
                            <label for="nome_produto" class="col-sm-2 col-form-label">Nome Produto</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nome_produto" name="nome_produto" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipo_produto" class="col-sm-2 col-form-label">Tipo Produto</label>
                            <div class="col-sm-8">
                                <select name="tipo_produto" class="form-control" id="tipo_produto" required="required">
                                    <option value="">Selecionar</option>
                                    <?php foreach($lista_tipo_produto as $lista): ?>
                                        <option value="<?php echo $lista->getId(); ?>"><?php echo $lista->getNomeTipoProduto(); ?></option>

                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="marca" class="col-sm-2 col-form-label">Marca</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="marca" name="marca" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="preco" class="col-sm-2 col-form-label">Preço R$</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="preco" name="preco" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descricao" class="col-sm-2 col-form-label">Descrição</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="descricao" name="descricao">
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Cadastrar</button>





                    </form>
					
				</div>
			</div>
        </div>

<?php

    include 'footer.php';

?>