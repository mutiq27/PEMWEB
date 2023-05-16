<?php
    require_once ('Product.php');
    class CDCabinet extends Product{
        private $capacity;
        private $model;

        function getCapacity(){
            return $this->capacity;
        }
        function setCapacity($capacity){
            $this->capacity = $capacity;
        }
        function getModel(){
            return $this->model;
        }
        function setModel($model){
            $this->model=$model;
        }
        function priceCabinet(){
            return $this->getPrice() + ($this->getPrice()*15/100);
        }
        function discountCabinet(){
            return $this->getDiscount();
        }

        function totalPriceCabinet(){
            return $this->priceCabinet() - ($this->priceCabinet()*($this->discountCabinet()/100));
        }

    }
?>