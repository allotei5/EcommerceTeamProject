<?php
require("../classes/product_class.php");

//function to add new author
function add_author($name){
    $product_object = new product_class;

    //run the query
    $run_query = $product_object->add_author($name);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function display_authors_fxn(){
    $product_object = new product_class;

    //run the query
    $run_query = $product_object->display_authors();

    if($run_query){
        while($record = $product_object->db_fetch()){
            $author_arr[] = $record;
        }
        return $author_arr;
    }else{
        return false;
    }
}

function display_one_author($id){
    $product_object = new product_class;

    //run the query
    $run_query = $product_object->display_one_author($id);

    if($run_query){
        $author_arr = $product_object->db_fetch();
        return $author_arr;
    }else{
        return false;
    }
}

function update_author_fxn($id,$name){
    $product_object = new product_class;

    //run the query
    $run_query = $product_object->update_author($id, $name);

    if ($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function delete_author_fxn($id){
    $product_object = new product_class;

    //run the query
    $run_query = $product_object->delete_author($id);

    if ($run_query){
        return $run_query;
    }else{
        return false;
    }
}

?>
