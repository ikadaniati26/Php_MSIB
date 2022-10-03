<?php
require_once 'Bentuk2D.php';
class Lingkaran extends Bentuk2D{
    public $r = 11;

    public function namaBidang(){
        echo 'Lingkaran';
    }
    public function luasBidang(){
        return $luas = 3.14 * $this-> r * $this-> r ;
    }
    public function kelilingBidang(){
        return $keliling = 2 * 3.14 * $this->r ;
    }
}