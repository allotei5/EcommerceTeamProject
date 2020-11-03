<?php
//require customer class
require("../classes/customer_class.php");

//function to register customer
function register_customer_fxn($name, $email, $password, $country, $city, $street, $zip_code, $contact){
    //create instance of class
    $customer_object = new customer_class;

    //run the register query
    $run_query = $customer_object->register_customer($name, $email, $password, $country, $city, $street, $zip_code, $contact);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function check_for_existing_customer_fxn($email){
    //create instance of class
    $customer_object = new customer_class;

    //run the query
    $run_query = $customer_object->check_for_existing_customer($email);

    if($run_query){
        $email_arr = $customer_object->db_fetch();
        return $email_arr;
    }else{
        return false;
    }
}

?>
