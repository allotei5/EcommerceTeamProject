<?php
require("../controllers/product_controller.php");
if(isset($_POST['submit'])){
    //grab form input
    $name = $_POST['name'];
    $id = $_POST['id'];
    if(!empty($name)){
        $add_author = update_author_fxn($id,$name);
        if($add_author){
            header("location: ../admin/author.php");
        }else{
            echo "something went wrong";
        }
    }
}
?>
