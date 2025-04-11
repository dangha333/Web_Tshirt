<?php
class  ThanhToan {
    public $conn;

    //Ket noi csdl
    public function __construct(){
        $this->conn = connectDB();
    }

   
    
}
?>