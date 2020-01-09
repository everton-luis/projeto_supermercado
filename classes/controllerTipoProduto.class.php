<?php

    include 'tipo_produto.class.php';

    class ControllerTipoProduto {

        public function cadastrarTipoProduto($nome_tipo_produto,$porcentagem_imposto){
            global $pdo;

            $sql = "insert into tipo_produto (nome_tipo_produto,porcentagem_imposto) values (:nome_tipo_produto,:porcentagem_imposto)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":nome_tipo_produto",$nome_tipo_produto);
            $sql->bindValue(":porcentagem_imposto",$porcentagem_imposto);
            $sql->execute();

        }

        public function listarTipoProduto(){
            global $pdo;

            $sql = "select * from tipo_produto order by id";
            $sql = $pdo->query($sql);

            $tipos_produtos = array();

            if($sql->rowCount() > 0){
                $lista_tipos_produtos = $sql->fetchAll();
                foreach($lista_tipos_produtos as $lista){
                    $tipo_produto = new TipoProduto();
                    $tipo_produto->setId($lista['id']);
                    $tipo_produto->setNomeTipoProduto($lista['nome_tipo_produto']);
                    $tipo_produto->setPorcentagemTipoProduto($lista['porcentagem_imposto']);

                    $tipos_produtos[] = $tipo_produto;

                }
            }

            return $tipos_produtos;

        }

        public function getIdTipoProduto($id){

            global $pdo;

            $sql = "select * from tipo_produto where id=:id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":id",$id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $info = $sql;
                return $info;
            }

        }

        public function atualizarIdTipoProduto($id,$nome_tipo_produto,$porcentagem_imposto){

            global $pdo;

            $sql = "update tipo_produto set nome_tipo_produto=:nome_tipo_produto, porcentagem_imposto=:porcentagem_imposto where id=:id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":nome_tipo_produto",$nome_tipo_produto);
            $sql->bindValue(":porcentagem_imposto",$porcentagem_imposto);
            $sql->bindValue(":id",$id);
            $sql->execute();


        }

        public function deletarId($id){

            global $pdo;

            $sql = "delete from tipo_produto where id=:id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":id",$id);
            $sql->execute();

        }

    }







?>