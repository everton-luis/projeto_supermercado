<?php

    include 'produto.class.php';

    class ControllerProduto {

        public function cadastrarProduto($nome_produto,$id_tipo_produto,$marca,$preco,$descricao){

            global $pdo;

            $sql = "insert into produto (nome_produto,id_tipo_produto,marca,preco,descricao) values (:nome_produto,:id_tipo_produto,:marca,:preco,:descricao)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":nome_produto",$nome_produto);
            $sql->bindValue(":id_tipo_produto",$id_tipo_produto);
            $sql->bindValue(":marca",$marca);
            $sql->bindValue(":preco",$preco);
            $sql->bindValue(":descricao",$descricao);
            $sql->execute();


        }

        public function listarProdutos(){
            
            global $pdo;

            $sql = "select produto.id, produto.nome_produto, produto.id_tipo_produto, produto.marca, produto.preco, produto.descricao, tipo_produto.nome_tipo_produto, 
            tipo_produto.porcentagem_imposto from produto inner join tipo_produto on tipo_produto.id = produto.id_tipo_produto";
            $sql = $pdo->query($sql);
            
            $produtos = array();

            if($sql->rowCount() > 0){
                $lista_produtos = $sql->fetchAll();
                foreach($lista_produtos as $lista){
                    $produto = new Produto();
                    $produto->setId($lista['id']);
                    $produto->setNomeProduto($lista['nome_produto']);
                    $produto->setIdTipoProduto($lista['id_tipo_produto']);
                    $produto->setMarca($lista['marca']);
                    $produto->setPreco($lista['preco']);
                    $produto->setDescricao($lista['descricao']);
                    $produto->setNomeTipoProduto($lista['nome_tipo_produto']);
                    $produto->setPorcentagemImposto($lista['porcentagem_imposto']);

                    $produtos[] = $produto;

                }
            }

            return $produtos;

        }

        public function getIdProduto($id){

            global $pdo;

            $sql = "select * from produto where id=:id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":id",$id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $info = $sql;
                return $info;
            }

        }

        public function atualizarIdProduto($id,$nome_produto,$id_tipo_produto,$marca,$preco,$descricao){

            global $pdo;

            $sql = "update produto set nome_produto=:nome_produto, id_tipo_produto=:id_tipo_produto, marca=:marca, preco=:preco, descricao=:descricao where id=:id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":nome_produto",$nome_produto);
            $sql->bindValue(":id_tipo_produto",$id_tipo_produto);
            $sql->bindValue(":marca",$marca);
            $sql->bindValue(":preco",$preco);
            $sql->bindValue(":descricao",$descricao);
            $sql->bindValue(":id",$id);
            $sql->execute();

        }

        public function deletarId($id){

            global $pdo;

            $sql = "delete from produto where id=:id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":id",$id);
            $sql->execute();

        }

        public function getIdCarrinho($id){

            global $pdo;

            $sql = "select produto.id, produto.nome_produto, produto.id_tipo_produto, produto.marca, produto.preco, produto.descricao, tipo_produto.nome_tipo_produto, 
            tipo_produto.porcentagem_imposto from produto inner join tipo_produto on tipo_produto.id = produto.id_tipo_produto where produto.id=:id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":id",$id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $info = $sql;
                return $info;
            }

        }


    }

?>