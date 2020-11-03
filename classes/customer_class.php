<?php
//connect to database class
require("../settings/db_class.php");

/**
*Customer class to handle everything customer related
*/
/**
 *@author Allotei Pappoe
 *
 */

class customer_class extends db_connection
{
    /*Method to register a new customer
    *takes name, email, password, country, city, street, zipcode, contact
    */

    public function register_customer($name, $email, $password, $country, $city, $street, $zip_code, $contact){
        $sql = "INSERT INTO `user`(`user_name`, `user_email`, `user_pass`, `user_country`, `user_city`, `user_street`, `zip_code`, `user_contact`, `user_role`) VALUES ('$name', '$email', '$password', '$country', '$city', '$street', '$zip_code', '$contact',2)";

        return $this->db_query($sql);
    }

    public function check_for_existing_customer($email){
        $sql = "SELECT `user_email` FROM `user` WHERE `user_email` = '$email'";

        return $this->db_query($sql);
    }

}
?>
