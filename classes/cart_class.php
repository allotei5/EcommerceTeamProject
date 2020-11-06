<?php
//connect to database class
require_once("../settings/db_class.php");

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
        $sql = "SELECT `isbn`, `ip_add` FROM `cart` WHERE `isbn`='$isbn' AND `ip_add`='$ip_add'";

        return $this->db_query($sql);
    }

    //display cart
    //logged in customers
    public function view_cart($user_id){
        $sql = "SELECT `cart`.`isbn`, `cart`.`user_id`, `cart`.`qty`, `books`.`book_title`, `books`.`book_price`, `books`.`book_image` FROM `cart` JOIN `books` ON (`cart`.`isbn` = `books`.`isbn`) WHERE `cart`.`user_id`='$user_id'";
        return $this->db_query($sql);
    }

    //not logged in customers
    public function view_cart_nlog($ip_add){
        $sql = "SELECT `cart`.`isbn`, `cart`.`ip_add`, `cart`.`qty`, `books`.`book_title`, `books`.`book_price`, `books`.`book_image` FROM `cart` JOIN `books` ON (`cart`.`isbn` = `books`.`isbn`) WHERE `cart`.`ip_add`='$ip_add'";
        return $this->db_query($sql);
    }

    public function update_cart_item_qty($isbn, $user_id, $qty){
        $sql = "UPDATE `cart` SET `qty`='$qty' WHERE `isbn`='$isbn' AND `user_id`='$user_id'";
        return $this->db_query($sql);
    }

    public function update_cart_item_nlog_qty($isbn, $ip_add, $qty){
        $sql = "UPDATE `cart` SET `qty`='$qty' WHERE `isbn`='$isbn' AND `ip_add`='$ip_add'";
        return $this->db_query($sql);
    }

    public function delete_cart_item($isbn, $user_id){
        $sql = "DELETE FROM `cart` WHERE `isbn`='$isbn' AND `user_id`='$user_id'";
        return $this->db_query($sql);
    }

    public function delete_cart_item_nlog($isbn, $ip_add){
        $sql = "DELETE FROM `cart` WHERE `isbn`='$isbn' AND `ip_add`='$ip_add'";
        return $this->db_query($sql);
    }

}
