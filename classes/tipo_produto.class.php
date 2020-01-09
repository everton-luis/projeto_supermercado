<?php

    class TipoProduto {

        private $id;
        private $nome_tipo_produto;
        private $porcentagem_tipo_produto;


        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setNomeTipoProduto($nome_tipo_produto){
            $this->nome_tipo_produto = $nome_tipo_produto;
        }

        public function getNomeTipoProduto(){
            return $this->nome_tipo_produto;
        }

        public function setPorcentagemTipoProduto($porcentagem_tipo_produto){
            $this->porcentagem_tipo_produto = $porcentagem_tipo_produto;
        }

        public function getPorcentagemTipoProduto(){
            return $this->porcentagem_tipo_produto;
        }

        






    }




?>