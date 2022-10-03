<?php
 require_once 'Bentuk2D.php';
 class PersegiPanjang extends Bentuk2D{
     public $p = 10, $l= 5;

    public function namaBidang(){
        echo 'Persegi Panjang';
    }
    public function LuasBidang(){
        return $luas = $this->p * $this->l;
    }
    public function KelilingBidang(){
        return $keliling = 2 * ( $this->p +  $this->l);
    }
 }