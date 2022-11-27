<?php
require_once("koneksi.php");

    class Events extends Koneksi 
    {
        public function __construct($server, $user, $pass, $db)
        {
            parent::__construct($server, $user, $pass, $db);
        }

        public function ShowEventsLimitFour() {
            $sql = "SELECT * FROM events order by date desc LIMIT 4";
            $res = $this->con->query($sql);
            return $res;
        }

        public function ShowEventsByID($id) {
            $sql = "SELECT * FROM events WHERE places_id=? order by date desc LIMIT 4";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param('i',$id); 
            $stmt->execute();
            $res = $stmt->get_result();
            return $res;
        }

        public function ShowEvent($id) {
            $sql = "SELECT * FROM events WHERE id=?";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param('i',$id); 
            $stmt->execute();
            $res = $stmt->get_result();
            return $res;
        }
    }
?>