<?php
class Database{
  
    public function getConnection(){		
      try{
		  $conn = new PDO("mysql:host=127.0.0.1;dbname= demo", "root","");
      echo"thanh cong";
			return $conn;
      }
      catch (PDOException $e) {
        echo "Kết nối thất bại: " . $e->getMessage();
		  }
}
}
?>

