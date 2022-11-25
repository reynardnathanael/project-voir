<?php
require_once("koneksi.php");

    class Places extends Koneksi 
    {
        public function __construct($server, $user, $pass, $db)
        {
            parent::__construct($server, $user, $pass, $db);
        }
        
        public function ShowPlacesLimitFour() {
            $sql = "SELECT * FROM places group by categories_id order by rating asc LIMIT 4";
            $res = $this->con->query($sql);
            return $res;
        }

        public function ShowPlacesLimitTwo($id) {
            $sql = "SELECT * FROM places WHERE categories_id=? order by rating desc LIMIT 2;";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param('i',$id); 
            $stmt->execute();
            $res = $stmt->get_result();
            return $res;
        }
    }
?>