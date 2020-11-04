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

    /*methods to add, display, update, and delete a genre*/

    public function add_genre($name){
        $sql = "INSERT INTO `genres`(`genre_name`) VALUES ('$name')";
        return $this->db_query($sql);
    }

    public function display_genres(){
        $sql = "SELECT * FROM `genres`";
        return $this->db_query($sql);
    }

    public function display_one_genre($id){
        $sql = "SELECT `genre_name` FROM `genres` WHERE `genre_id` ='$id'";
        return $this->db_query($sql);
    }

    public function update_genre($id, $name){
        $sql = "UPDATE `genres` SET `genre_name`='$name' WHERE `genre_id`='$id'";
        return $this->db_query($sql);
    }

    public function delete_genre($id){
        $sql = "DELETE FROM `genres` WHERE `genre_id`='$id'";
        return $this->db_query($sql);
    }

    /*methods to add, edit, update and delete books */
    public function add_book($genre,$author,$title,$price,$desc,$img,$publisher,$pub_year,$stock){
        $sql = "INSERT INTO `books`(`book_genre`, `author_id`, `book_title`, `book_price`, `book_desc`, `book_image`, `publisher`, `published_year`, `stock`) VALUES ('$genre','$author','$title','$price','$desc','$img','$publisher','$pub_year','$stock')";
        return $this->db_query($sql);
    }
}


?>
