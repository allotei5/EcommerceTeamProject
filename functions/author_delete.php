<?php
require("../controllers/product_controller.php");
$delete = delete_author_fxn($_GET['id']);
if($delete){
    header("location: ../admin/author.php");
}else{
    echo "something went wrong";
}
?>
