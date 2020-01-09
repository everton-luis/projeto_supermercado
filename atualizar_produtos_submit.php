<?php

    include 'config.php';
    include 'classes/controllerProduto.class.php';

    if(isset($_POST['nome_produto'])){

        $produto = new Produto();

        $produto->setNomeProduto($_POST['nome_produto']);
        $produto->setIdTipoProduto($_POST['tipo_produto']);
        $produto->setMarca($_POST['marca']);
        $produto->setPreco($_POST['preco']);
        $produto->setDescricao($_POST['descricao']);
        $id = $_POST['id'];

        $nome_produto = $produto->getNomeProduto();
        $id_tipo_produto = $produto->getIdTipoProduto();
        $marca = $produto->getMarca();
        $preco = $produto->getPreco();
        $descricao = $produto->getDescricao();
        $preco = str_replace(".","",$preco);
        $preco = str_replace(",",".",$preco);

        echo $id;
        echo '<br/>';
        echo $preco;

        $controllerProduto = new ControllerProduto();

        $controllerProduto->atualizarIdProduto($id,$nome_produto,$id_tipo_produto,$marca,$preco,$descricao);
        
        echo "<script>location.href='produtos.php';</script>";

    }





?>