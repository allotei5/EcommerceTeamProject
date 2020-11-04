<?php
require("../controllers/product_controller.php");
if(isset($_POST['submit'])){
    //grab form input
    $name = $_POST['name'];
    if(!empty($name)){
        $add_author = add_author($name);
        if($add_author){
            header("location: ../admin/author.php");
        }else{
            echo "something went wrong";
        }
    }
}
?>
