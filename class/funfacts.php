<?php
require_once("koneksi.php");

    class Funfacts extends Koneksi 
    {
        public function __construct($server, $user, $pass, $db)
        {
            parent::__construct($server, $user, $pass, $db);
        }
        
        public function ShowFunfact($id) {
            $sql = "SELECT * FROM funfacts WHERE places_id=?";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param('i',$id); 
            $stmt->execute();
            $res = $stmt->get_result();
            return $res;
        }
    }
?>