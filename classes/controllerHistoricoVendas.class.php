<?php

    include 'historico_vendas.php';

    class ControllerHistoricoVendas {

        public function cadastrar($id_produto,$quantidade){

            global $pdo;
            
            $sql = "insert into historico_vendas (id_produto,quantidade,data_pedido) values (:id_produto,:quantidade,NOW())";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":id_produto",$id_produto);
            $sql->bindValue(":quantidade",$quantidade);
            $sql->execute();

        }

        public function listaHistoricoVendas(){

            global $pdo;

            $sql = "select historico_vendas.id, historico_vendas.id_produto, historico_vendas.quantidade, historico_vendas.data_pedido, produto.nome_produto
            from historico_vendas inner join produto on produto.id=historico_vendas.id_produto";
            $sql = $pdo->query($sql);

            $historicos_vendas = array();

            if($sql->rowCount() > 0){
                $listaHistoricoVendas = $sql->fetchAll();
                foreach($listaHistoricoVendas as $lista){
                    $historico_vendas = new HistoricoVendas();
                    $historico_vendas->setId($lista['id']);
                    $historico_vendas->setIdProduto($lista['id_produto']);
                    $historico_vendas->setQuantidade($lista['quantidade']);
                    $historico_vendas->setDataPedido($lista['data_pedido']);
                    $historico_vendas->setNomeProduto($lista['nome_produto']);
                    $historicos_vendas[] = $historico_vendas;
                }
            }

            return $historicos_vendas;

        }

        public function getGraficosPedidosProduto(){

            global $pdo;

            $sql = "select historico_vendas.id_produto,sum(quantidade) as total,produto.nome_produto from historico_vendas
            inner join produto on produto.id=historico_vendas.id_produto group by historico_vendas.id_produto, produto.nome_produto";
            $sql = $pdo->query($sql);

            if($sql->rowCount() > 0){
                $sql = $sql->fetchAll();
                $info = $sql;
                return $info;
            }

        }

        public function getGraficosTiposProdutos(){

            global $pdo;

            $sql = "select SUM(quantidade) as total,produto.id_tipo_produto,tipo_produto.nome_tipo_produto 
            from historico_vendas inner join produto on produto.id=historico_vendas.id_produto inner join tipo_produto on tipo_produto.id=produto.id_tipo_produto 
            group by produto.id_tipo_produto, tipo_produto.nome_tipo_produto";
            $sql = $pdo->query($sql);

            if($sql->rowCount() > 0){
                $sql = $sql->fetchAll();
                $info = $sql;
                return $info;
            }
            

        }

    }


?>