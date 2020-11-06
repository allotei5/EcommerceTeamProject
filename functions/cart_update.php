<?php
require("../controllers/cart_controller.php");
require_once("../settings/core.php");

//check if form submit is clicked
if(isset($_GET['submit'])){
    //grab inputs
    $qty = $_GET['qty'];
    $isbn = $_GET['isbn'];

    //check for logged in
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        $update = update_cart_item_qty_fxn($isbn,$user_id,$qty);
        if($update){
            echo "success";
        }else{
            echo "failed";
        }
    }else{
        $ip_add = getRealIpAddr();
        $update = update_cart_item_qty_nlog_fxn($isbn, $ip_add, $qty);
        if($update){
            echo "success";
        }else{
            echo "failed";
        }
    }
}
?>
