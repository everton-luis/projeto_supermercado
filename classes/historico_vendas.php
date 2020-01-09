<?php

    class HistoricoVendas{

        private $id;
        private $id_produto;
        private $quantidade;
        private $data_pedido;
        private $nome_produto;

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setIdProduto($id_produto){
            $this->id_produto = $id_produto;
        }

        public function getIdProduto(){
            return $this->id_produto;
        }

        public function setQuantidade($quantidade){
            $this->quantidade = $quantidade;
        }

        public function getQuantidade(){
            return $this->quantidade;
        }

        public function setDataPedido($data_pedido){
            $this->data_pedido = $data_pedido;
        }

        public function getDataPedido(){
            return $this->data_pedido;
        }

        public function setNomeProduto($nome_produto){
            $this->nome_produto = $nome_produto;
        }

        public function getNomeProduto(){
            return $this->nome_produto;
        }

    }


?>