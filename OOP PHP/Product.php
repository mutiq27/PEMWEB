<?php
    class Product {
        protected $name;
        protected $price;
        protected $discount;
        function getPrice(){
            return $this->price;
        } 
        function setPrice ($price){
            $this->price = $price;
        }
        function getDiscount(){
            return $this->discount;
        }
        function setDiscount ($discount){
            $this->discount = $discount;
        }
        function getName(){
            return $this->name;
        }
        function setName ($name){
            $this->name = $name;
        }
    }
    
?>