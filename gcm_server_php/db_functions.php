<?php
error_reporting(E_ALL ^ E_DEPRECATED);
class DB_Functions {

    private $db;
    // $link1;

    //put your code here
    // constructor
    function __construct() {
        include_once './db_connect.php';
      //  $link1 = $link;
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
        // $link = db.connect();
    }

    // destructor
    function __destruct() {
        
    }

    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($name, $email, $gcm_regid) {
        // insert user into database
        global $link;
        $result = mysqli_query($link ,"INSERT INTO gcm_users(name, email, gcm_regid, created_at) VALUES('$name', '$email', '$gcm_regid', NOW())");
        // check for successful store
        if ($result) {
            // get user details
            $id = mysql_insert_id(); // last inserted id
            $result = mysqli_query($link ,"SELECT * FROM gcm_users WHERE id = $id") or die(mysql_error());
            // return user details


$num_rows = $result->num_rows;


            if ($num_rows > 0) {
                return mysql_fetch_array($result);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Get user by email and password
     */
    public function getUserByEmail($email) {
		global $link;
        $result = mysqli_query($link,"SELECT * FROM gcm_users WHERE email = '$email' LIMIT 1");
        return $result;
    }

    /**
     * Getting all users
     */
    public function getAllUsers() {
		global $link;
        $result = mysqli_query($link,"select * FROM gcm_users");
        return $result;
    }

    /**
     * Check user is existed or not
     */
    public function isUserExisted($email) {
		global $link;
        $result = mysqli_query($link,"SELECT email from gcm_users WHERE email = '$email'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            // user existed
            return true;
        } else {
            // user not existed
            return false;
        }
    }

}

?>