<?php
 require_once 'Bentuk2D.php';

 class segitiga extends Bentuk2D{
    public $a= 10, $t = 15;

    public function namaBidang(){
        echo 'Segitiga';
    }
    public function luasBidang(){
        return $luas = 0.5 * $this->a * $this->t;
    }
    public function kelilingBidang(){
        $a = 10;
        $b = 15;
        $c = 20;
        return $keliling = $a + $b + $c;
    }
 }