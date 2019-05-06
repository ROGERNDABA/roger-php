<?php

class Init {
    private $conn;
    private $servername = "localhost";
    private $username = "admin";
    private $password = "Ndabezitha2%";

    function __construct($db) {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$db", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch(PDOException $e) {
            echo "Something went teribbly wrong";
        }
    }
}

    

class General {
    function __construct() {}
    public function CheckRequest($header) {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
            if(!$_SERVER['HTTP_X_REQUESTED_WITH']== $header){
                http_response_code(403);
                header("Location: /public/error_pages/403.php");
                exit;
            }
        } else {
            http_response_code(403);
            header("Location: /public/error_pages/");
            exit;
        }
    }
}

?>