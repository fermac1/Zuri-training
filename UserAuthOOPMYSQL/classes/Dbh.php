<?php
    class Dbh{
        //properties
        private $hostname; 
        private $username; 
        private $password; 
        private $dbname; 

        //methods
        protected function connect(){
            $this->hostname = "localhost"; 
            $this->username = "root";
            $this->password = ""; 
            $this->dbname = "zuriphp";

            $conn = new mysqli( $this->hostname, $this->username, $this->password, $this->dbname );
            return $conn;  
		
		if ( mysqli_connect_errno() ) {
			printf("Connection failed: %s\
", mysqli_connect_error());
			exit();
		}else{
            echo 'yes';
        }
		return true;
        }

    }
?>