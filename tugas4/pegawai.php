<?php 
    class Pegawai{
        public $nip;
        public $nama;
        public $jabatan;
        public $agama;
        public $status;

        static $total = 0;
        const PEGAWAI = 'PT GAJAH DUDUK INDONESIA';

        // member constuctror
        public function __construct($nip, $nama, $jabatan, $agama, $status){
            $this->nip = $nip;
            $this->nama = $nama;
            $this->jabatan = $jabatan;
            $this->agama = $agama;
            $this->status = $status;
            self::$total++;
        }

        public function setGapok(){
            switch ($this->jabatan) {
                case 'Manager': $gapok = 15000000; break;
                case 'Asmen': $gapok = 10000000; break;
                case 'Kabag': $gapok = 7000000; break;
                case 'Staff': $gapok = 4000000; break;
                default: $gapok = 0; break;
            }         
            return $gapok;     
        }

        public function setTunjab(){
            return $tunjab = $this->setGapok() * 0.2;
        }

        public function setTunkel(){
            return $tunkel = $this->status == 'Menikah' ? $this->setGapok() * 0.1 : 0; 
        }

        public function brutto(){
            return $this->brutto = $this->setGapok() + $this->setTunjab() + $this->setTunkel();
        }

        public function setZakatProfesi(){
            $zakat = 0;
            if ($this->agama == 'Islam' && $this->brutto() >= 6000000) {
                $zakat = $this->setGapok() * 0.025;
            } else {
                $zakat = 0;
            }
            return $zakat;
        }

        public function setThPay(){
            return  $tHPay = $this->setGapok() - $this->setZakatProfesi();
        }


        public function cetak(){
            echo '<b><u>'.self::PEGAWAI.'</u></b>';
            echo '<br />';
            echo '<br />NIP: '.$this->nip;
            echo '<br />Nama: '.$this->nama;
            echo '<br />Jabatan: '.$this->jabatan;
            echo '<br />Agama: '.$this->agama;
            echo '<br />Status: '.$this->status;
            echo '<br />Gaji Pokok: '.$this->setGapok();
            echo '<br />Tunjangan Jabatan: '.$this->setTunjab();
            echo '<br />Tunjangan Keluarga: '.$this->setTunkel();
            echo '<br />Zakat: '.$this->setZakatProfesi();
            echo '<br />Gaji Bersih: '.$this->setThPay();
            echo '<hr />';
        }
    }
?>