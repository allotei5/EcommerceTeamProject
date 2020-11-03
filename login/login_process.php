<?php
require("../controllers/customer_controller.php");
$errors = array();
if(isset($_POST['submit'])){
    //grab form inputs
    $email = $_POST['email'];
    $password = $_POST['password'];
    $enc_password = md5($password);

    //check if email has been submitted
    if(!empty($email)){
        $verify_customer = verify_customer_fxn($email);
        if($verify_customer){
            if($verify_customer['user_pass'] == $enc_password){
                session_start();
                $_SESSION['user_id'] = $verify_customer['user_id'];
                $_SESSION['user_role'] = $verify_customer['user_role'];
                header("location: ../view/index.php");
            }else{
                echo "email or password is wrong";
            }
        }else{
            echo "query error";
        }
    }
}
?>
