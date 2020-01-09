<?php

    include 'config.php';
    include 'header.php';
    include 'classes/controllerTipoProduto.class.php';

    $id = 0;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    

    $controllerTipoProduto = new ControllerTipoProduto();
    $dados_id = $controllerTipoProduto->getIdTipoProduto($id);
    $nome_tipo_produto = $dados_id['nome_tipo_produto'];
    $porcentagem_imposto = $dados_id['porcentagem_imposto'];


?>

    <div class="content-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
                    
                    <h1>Atualizar Tipo Produto</h1>
                    
                    <br/>

                    <form action="atualizar_tipo_produto_submit.php" method="POST">

                        <input type="hidden" name="id" value="<?php echo $id; ?>" />

                        <div class="form-group row">
                            <label for="nome_tipo_produto" class="col-sm-2 col-form-label">Nome Tipo Produto</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nome_tipo_produto" name="nome_tipo_produto" value="<?php echo $nome_tipo_produto; ?>" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="porcentagem_imposto" class="col-sm-2 col-form-label">Valor Imposto</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="valor_imposto" name="porcentagem_imposto" value="<?php echo str_replace(".",",",$porcentagem_imposto); ?>" pattern="[0-9]{1,},[0-9]{1,2}" required="required">
                                <small id="porcentagem_imposto" class="form-text text-muted">
                                    Digite o número do valor do imposto. Por exemplo o imposto do produto é de 10%, digite 10,0.<br/>
                                    Por exemplo o imposto é 15,5% , digite 15,5 . Após a vírgula são aceitos apenas até duas casas decimais.<br/>
                                    Não é aceito o uso de ponto.
                                </small>
                            </div>
                        </div>

                        <br/>

                        <button type="submit" class="btn btn-primary">Atualizar</button>



                    </form>

					
				</div>
			</div>
        </div>

<?php

    include 'footer.php';

?>