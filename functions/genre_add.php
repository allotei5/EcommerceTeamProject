<?php
require("../controllers/product_controller.php");
if(isset($_POST['submit'])){
    //grab form input
    $name = $_POST['name'];
    if(!empty($name)){
        $add_genre = add_genre_fxn($name);
        if($add_genre){
            header("location: ../admin/genre.php");
        }else{
            echo "something went wrong";
        }
    }
}
?>
