<?php
//connect to database class
require("../settings/db_class.php");

/**
*Customer class to handle everything cart related
*/
/**
 *@author Allotei Pappoe
 *
 */

class cart_class extends db_connection
{
    //method to insert into the cart when customer has logged in
    public function insert_into_cart_log($isbn, $ip_add, $user_id, $qty){
        $sql = "INSERT INTO `cart`(`isbn`, `ip_add`, `user_id`, `qty`) VALUES ('$isbn','$ip_add','$user_id','$qty')";
        return $this->db_query($sql);
    }

    //method to insert into the cart when the customer hasn't logged in
    public function insert_into_cart_nlog($isbn, $ip_add, $qty){
        $sql = "INSERT INTO `cart`(`isbn`, `ip_add`, `qty`) VALUES ('$isbn','$ip_add','$qty')";
        return $this->db_query($sql);
    }

    //check for duplicates
    //logged in customers
    public function check_duplicate_log($isbn, $user_id){
        $sql = "SELECT `isbn`, `user_id` FROM `cart` WHERE `isbn`='$isbn' AND `user_id`='$user_id'";

        return $this->db_query($sql);
    }

    //not logged in customers
    public function check_duplicate_nlog($isbn, $ip_add){
        $sql = "SELECT `isbn`, `user_id` FROM `cart` WHERE `isbn`='$isbn' AND `ip_add`='$ip_add'";

        return $this->db_query($sql);
    }

}
