<?php

    include 'config.php';
    include 'classes/controllerTipoProduto.class.php';

    if(isset($_POST['nome_tipo_produto'])){

        $tipo_produto = new TipoProduto();

        $tipo_produto->setNomeTipoProduto($_POST['nome_tipo_produto']);
        $tipo_produto->setPorcentagemTipoProduto($_POST['porcentagem_imposto']);
        $id = $_POST['id'];
        
        $nome_tipo_produto = $tipo_produto->getNomeTipoProduto();
        $porcentagem_imposto = $tipo_produto->getPorcentagemTipoProduto();
        $porcentagem_imposto = str_replace(",",".",$porcentagem_imposto);
        //$porcentagem_imposto = floatval($porcentagem_imposto);
        //$porcentagem_imposto = $porcentagem_imposto * 0.01;

        $controllerTipoProduto = new controllerTipoProduto();

        $controllerTipoProduto->atualizarIdTipoProduto($id,$nome_tipo_produto,$porcentagem_imposto);

        echo "<script>location.href='tipo_produto.php';</script>";
        

    }


?>