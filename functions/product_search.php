<?php
require("../controllers/product_controller.php");
if(isset($_GET['search_term'])){
    $search_term = $_GET['search_term'];
    $books_arr = search_for_book_fxn($search_term);
    if(empty($books_arr)){
        echo "term not found please try another";
    }else{
        print_r($books_arr);
    }
}else{
    header("location: ../view/index.php");
}

?>
