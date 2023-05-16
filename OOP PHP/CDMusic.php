<?php
    require_once ('Product.php');
    class CDMusic extends Product{
        private $artist;
        private $genre;

        function getArtist(){
            return $this->artist;
        }
        function setArtist($artist){
            $this->artist = $artist;
        }
        function getGenre(){
            return $this->genre;
        }
        function setGenre($genre){
            $this->genre=$genre;
        }

        function priceMusic(){
            return $this->getPrice() + ($this->getPrice()*10/100);
        }

        function discountMusic(){
            return $this->getDiscount()+5;
        }

        function totalPriceMusic(){
            return $this->priceMusic() - ($this->priceMusic()*($this->discountMusic()/100));
        }

    }
?>