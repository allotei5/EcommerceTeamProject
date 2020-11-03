<?php
require("../controllers/customer_controller.php");
$errors = array();
if(isset($_POST['submit'])){
    //grab form inputs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_con = $_POST['password_con'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $zip_code = $_POST['zip_code'];
    $contact = $_POST['contact'];

    //validate inputs
    //check if empty
    if(empty($name)){ array_push($errors, "name cannot be empty");}
    if(empty($email)){ array_push($errors, "email cannot be empty");}
    if(empty($password)){ array_push($errors, "password cannot be empty");}

    if(empty($country)){ array_push($errors, "country cannot be empty");}
    if(empty($city)){ array_push($errors, "city cannot be empty");}
    if(empty($street)){ array_push($errors, "street cannot be empty");}
    if(empty($contact)){ array_push($errors, "contact cannot be empty");}

    //check for appropriate lengths
    if(strlen($name) > 100){ array_push($errors, "name is too long");}
    if(strlen($email) > 50){ array_push($errors, "email is too long");}
    if(strlen($country) > 30){ array_push($errors, "country is too long");}
    if(strlen($city) > 30){ array_push($errors, "city is too long");}
    if(strlen($street) > 30){ array_push($errors, "street is too long");}
    if(strlen($zip_code) > 30){ array_push($errors, "zip code is too long");}
    if(strlen($contact) > 15){ array_push($errors, "contact is too long");}

    //check if user already exists
    $email_arr = check_for_existing_customer_fxn($email);
    if($email_arr['user_email'] == $email){
        array_push($errors, "user already exists");
    }

    //check if passwords match
    if($password != $password_con){ array_push($errors, "passwords don't match");}

    //if there are no errors
    if(count($errors) == 0){
        $enc_password = md5($password);
        $register_customer = register_customer_fxn($name, $email, $enc_password, $country, $city, $street, $zip_code, $contact);

        if($register_customer){
            echo "success";
        }else{
            echo "failed";
        }
    }
}
?>
