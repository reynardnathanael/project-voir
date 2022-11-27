<?php
require_once("koneksi.php");

    class Contents extends Koneksi 
    {
        public function __construct($server, $user, $pass, $db)
        {
            parent::__construct($server, $user, $pass, $db);
        }

        public function ShowContentsByID($id) {
            $sql = "SELECT * FROM contents WHERE events_id=? order by id asc";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param('i',$id); 
            $stmt->execute();
            $res = $stmt->get_result();
            return $res;
        }
    }
?>