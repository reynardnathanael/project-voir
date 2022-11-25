<?php
require_once("koneksi.php");

    class Categories extends Koneksi 
    {
        public function __construct($server, $user, $pass, $db)
        {
            parent::__construct($server, $user, $pass, $db);
        }
        
        public function ShowCategories() {
            $sql = "SELECT * FROM categories";
            $res = $this->con->query($sql);
            return $res;
        }

        public function ShowCategoryByID($id) {
            $sql = "SELECT * FROM categories WHERE id=?";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param('i',$id); 
            $stmt->execute();
            $res = $stmt->get_result();
            return $res;
        }
    }
?>