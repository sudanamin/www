
<?php
  error_reporting(E_ALL ^ E_DEPRECATED);
//echo 1 > /proc/sys/net/ipv6/conf/all/disable_ipv6;
$link;
class DB_Connect {
  
    // constructor
    function __construct() {
  
    }
  
    // destructor
    function __destruct() {
        // $this->close();
    }
  
    // Connecting to database
    public function connect() {
        require_once 'config.php';
global $link ;
        // connecting to mysql
       // $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD);
        // selecting database
       $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, "gcm");

        // return database handler
        return $link;
    }
  
    // Closing database connection
    public function close() {
        mysql_close();
    }
  
}
?>