<?php
require("../controllers/cart_controller.php");
require_once("../settings/core.php");
if(isset($_GET['isbn'])){
    $isbn = $_GET['isbn'];

    if(isset($_SESSION['customer_id'])){

        $user_id = $_SESSION['customer_id'];
        $delete = delete_cart_item_fxn($isbn,$user_id);
        if($delete){
            echo "success";
        }else{
            echo "failed";
        }
    }else{
        $ip_add = getRealIpAddr();
        $delete = delete_cart_item_nlog_fxn($isbn, $ip_add);
        if($delete){
            echo "success";
        }else{
            echo "failed";
        }
    }
}
?>
