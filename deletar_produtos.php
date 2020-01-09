<?php

    include 'config.php';
    include 'classes/controllerProduto.class.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $controllerProduto = new ControllerProduto();
        $controllerProduto->deletarId($id);
        echo "<script>location.href='produtos.php';</script>";

    }


?>