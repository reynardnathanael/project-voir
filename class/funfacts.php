<?php
require_once("koneksi.php");

    class Singer extends Koneksi 
    {
        public function __construct($server, $user, $pass, $db)
        {
            parent::__construct($server, $user, $pass, $db);
        }
        
        public function ShowSingers() {
            $sql = "SELECT * FROM singers";
            $res = $this->con->query($sql);
            return $res;
        }
    }
?>