<?php


    class Produto {

        private $id;
        private $nome_produto;
        private $id_tipo_produto;
        private $marca;
        private $preco;
        private $descricao;
        private $nome_tipo_produto;
        private $porcentagem_imposto;


        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setNomeProduto($nome_produto){
            $this->nome_produto = $nome_produto;
        }

        public function getNomeProduto(){
            return $this->nome_produto;
        }

        public function setIdTipoProduto($id_tipo_produto){
            $this->id_tipo_produto = $id_tipo_produto;
        }

        public function getIdTipoProduto(){
            return $this->id_tipo_produto;
        }

        public function setMarca($marca){
            $this->marca = $marca;
        }

        public function getMarca(){
            return $this->marca;
        }

        public function setPreco($preco){
            $this->preco = $preco;
        }

        public function getPreco(){
            return $this->preco;
        }

        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function setNomeTipoProduto($nome_tipo_produto){
            $this->nome_tipo_produto = $nome_tipo_produto;
        }

        public function getNomeTipoProduto(){
            return $this->nome_tipo_produto;
        }

        public function setPorcentagemImposto($porcentagem_imposto){
            $this->porcentagem_imposto = $porcentagem_imposto;
        }

        public function getPorcentagemImposto(){
            return $this->porcentagem_imposto;
        }



    }


?>