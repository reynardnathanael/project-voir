<?php
require_once("koneksi.php");

    class Hotels extends Koneksi 
    {
        public function __construct($server, $user, $pass, $db)
        {
            parent::__construct($server, $user, $pass, $db);
        }

        public function ShowSingleHotel($id) {
            $sql = "SELECT * FROM hotels WHERE places_id=? order by id desc LIMIT 1";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param('i',$id); 
            $stmt->execute();
            $res = $stmt->get_result();
            return $res;
        }
        public function ShowHotelsLimit5($id) {
            $sql = "SELECT * FROM hotels WHERE places_id=? LIMIT 5";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param('i',$id); 
            $stmt->execute();
            $res = $stmt->get_result();
            return $res;
        }
        public function ShowHotelByID($id) {
            $sql = "SELECT * FROM hotels WHERE id=?";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param('i',$id); 
            $stmt->execute();
            $res = $stmt->get_result();
            return $res;
        }
    }
?>