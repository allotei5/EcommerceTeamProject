<?php
//connect to database class
require("../settings/db_class.php");

/**
*Product class to handle everything product related
*/
/**
 *@author Allotei Pappoe
 *
 */

class product_class extends db_connection
{
    /*Method to register a new author
    *takes author name
    */

    public function add_author($name){
        $sql = "INSERT INTO `author`(`author_name`) VALUES ('$name')";
        return $this->db_query($sql);
    }

    public function display_authors(){
        $sql = "SELECT * FROM `author`";
        return $this->db_query($sql);
    }

    public function display_one_author($id){
        $sql = "SELECT `author_name` FROM `author` WHERE `author_id` ='$id'";
        return $this->db_query($sql);
    }

    public function update_author($id, $name){
        $sql = "UPDATE `author` SET `author_name`='$name' WHERE `author_id`='$id'";
        return $this->db_query($sql);
    }

    public function delete_author($id){
        $sql = "DELETE FROM `author` WHERE `author_id`='$id'";
        return $this->db_query($sql);
    }
}

?>
