<?php
require("../controllers/product_controller.php");
$errors = array();

//if submit
if(isset($_POST['submit'])){
    $book_title = $_POST['book_title'];
    $book_price = $_POST['book_price'];
    $book_desc = $_POST['book_desc'];
    $book_author = $_POST['book_author'];
    $book_genre = $_POST['book_genre'];
    $book_publisher = $_POST['book_publisher'];
    $book_pub_year = $_POST['book_pub_year'];
    $book_stock = $_POST['book_stock'];

    //check if fields are empty
    if(empty($book_title)){array_push($errors, "title is required");}
    if(empty($book_price)){array_push($errors, "price is required");}
    if(empty($book_desc)){array_push($errors, "description is required");}
    if(empty($book_author)){array_push($errors, "author is required");}
    if(empty($book_genre)){array_push($errors, "genre is required");}
    if(empty($book_publisher)){array_push($errors, "publisher is required");}
    if(empty($book_pub_year)){array_push($errors, "publisher year is required");}
    if(empty($book_stock)){array_push($errors, "stock year is required");}

    //check if fields are of appropriate length
    if(strlen($book_title) > 200){array_push($errors, "title is too long");}
    if(strlen($book_desc) > 500){array_push($errors, "description is too long");}
    if(strlen($book_publisher) > 100){array_push($errors, "publisher is too long");}
    if(strlen($book_pub_year) > 20){array_push($errors, "year is too long");}

    //image validation
    $target_dir = "../images/products/";
    $target_file = $target_dir . basename($_FILES["book_image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    //check if image has been uploaded
    if(empty($_FILES["book_image"]["name"])){
        array_push($errors, "file cannot be empty");
    }else{
        //check if its an actual image
        $check = getimagesize($_FILES["book_image"]["tmp_name"]);
        if($check == false){
            array_push($errors, "file is not an image");
        }
        //check if file already exists
        if(file_exists($target_file)){
            array_push($errors, "File already exists");
        }
        //limit file size
        if($_FILES["book_image"]["size"] > 5000000){
            array_push($errors, "file is too large");
        }
        //limit file type
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
            array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        }
    }

    //if form is fine
    if(count($errors) == 0){
        $uploadImage = move_uploaded_file($_FILES["book_image"]["tmp_name"],$target_file);
        if($uploadImage){
            $addProduct = add_book_fxn($book_genre,$book_author,$book_title,$book_price,$book_desc,$target_file,$book_publisher,$book_pub_year,$book_stock);

            if($addProduct){header("location: ../admin/product.php");}
            else{echo "add failed"; }
        }else{
            echo "upload failed";
        }
    }
    if(count($errors) >0){
        foreach($errors as $error){
            echo $error."<br>";
        }
    }
}
?>
