<?php
require_once("../classes/cart_class.php");

function insert_into_cart_log_fxn($isbn, $ip_add, $user_id, $qty){
    $new_cart_object = new cart_class();

    $run_query = $new_cart_object->insert_into_cart_log($isbn, $ip_add, $user_id, $qty);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function insert_into_cart_nlog_fxn($isbn, $ip_add, $qty){
    $new_cart_object = new cart_class();

    $run_query = $new_cart_object->insert_into_cart_nlog($isbn, $ip_add, $qty);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function check_duplicate_log_fxn($isbn, $user_id){
    $new_cart_object = new cart_class();

    $run_query = $new_cart_object->check_duplicate_log($isbn, $user_id);
    if($run_query){
        $record = $new_cart_object->db_fetch();
        if(!empty($record['isbn']) && !empty($record['user_id'])){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function check_duplicate_nlog_fxn($isbn, $ip_add){
    $new_cart_object = new cart_class();

    $run_query = $new_cart_object->check_duplicate_nlog($isbn, $ip_add);
    if($run_query){
        $record = $new_cart_object->db_fetch();
        if(!empty($record['isbn']) && !empty($record['ip_add'])){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function view_cart_fxn($user_id){
    $new_cart_object = new cart_class();

    $run_query = $new_cart_object->view_cart($user_id);
    if($run_query){
        $cart_arr = array();
        while($record = $new_cart_object->db_fetch()){
            $cart_arr[] = $record;
        }
        return $cart_arr;
    }else{
        return false;
    }
}

function view_cart_nlog_fxn($ip_add){
    $new_cart_object = new cart_class();

    $run_query = $new_cart_object->view_cart_nlog($ip_add);
    if($run_query){
        $cart_arr = array();
        while($record = $new_cart_object->db_fetch()){
            $cart_arr[] = $record;
        }
        return $cart_arr;
    }else{
        return false;
    }
}

function update_cart_item_qty_fxn($isbn, $user_id, $qty){
    $new_cart_object = new cart_class();

    $run_query = $new_cart_object->update_cart_item_qty($isbn, $user_id, $qty);
    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function update_cart_item_qty_nlog_fxn($isbn, $ip_add, $qty){
    $new_cart_object = new cart_class();

    $run_query = $new_cart_object->update_cart_item_nlog_qty($isbn, $ip_add, $qty);
    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function delete_cart_item_fxn($isbn, $user_id){
    $new_cart_object = new cart_class();

    $run_query = $new_cart_object->delete_cart_item($isbn, $user_id);
    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function delete_cart_item_nlog_fxn($isbn, $ip_add){
    $new_cart_object = new cart_class();

    $run_query = $new_cart_object->delete_cart_item_nlog($isbn, $ip_add);
    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}
?>
