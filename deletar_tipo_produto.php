<?php

    include 'config.php';
    include 'classes/controllerTipoProduto.class.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $controllerTipoProduto = new ControllerTipoProduto();
        $controllerTipoProduto->deletarId($id);

        echo "<script>location.href='tipo_produto.php';</script>";

    }



?>