<?php
require_once("../controllers/cart_controller.php");
require_once("../settings/core.php");

//get book info from link
$isbn = $_GET['isbn'];
$qty = $_GET['qty'];

//get ipaddress of client
$ip_add = getRealIpAddr();

//check if customer is logged in
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];

    //check for duplicates
    $is_duplicate = check_duplicate_log_fxn($isbn, $user_id);

    //if item is already in cart
    if($is_duplicate){
        ?>
    <script type="text/javascript">
        alert("Product is already in cart. Consider increasing qty in your cart");
        window.location.href = "../view/index.php";
    </script>
<?php
    }else{
        $add_to_cart = insert_into_cart_log_fxn($isbn, $ip_add, $user_id, $qty);

        if($add_to_cart){
            header("location: ../view/index.php");
        }else{
            echo "something went wrong";
        }
    }
}else{
    //if customer hasn't logged in
    $is_duplicate = check_duplicate_nlog_fxn($isbn, $ip_add);
    if($is_duplicate){
    ?>
    <script type="text/javascript">
            alert("Product is already in cart. Consider increasing qty in your cart");
            window.location.href = "../view/index.php";
    </script>
<?php
    }else{
        $add_to_cart = insert_into_cart_nlog_fxn($isbn, $ip_add, $qty);

        if($add_to_cart){
            header("location: ../view/index.php");
        }else{
            echo "something went wrong";
        }
    }
}

?>
