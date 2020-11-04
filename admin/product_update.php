<?php
require("../controllers/product_controller.php");
$author_arr = display_authors_fxn();
$genre_arr = display_genres_fxn();
$book_arr = display_one_book_fxn($_GET['id']);
print_r($book_arr);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Add Product</title>
  </head>
  <body>
      <div class="container">
        <h1>Update Product</h1>
        <form method="post" action="../functions/product_update.php" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputname">Book Title</label>
              <input type="text" class="form-control" id="inputname" name="book_title" value="<?php echo $book_arr['book_title']; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="inputprice">Price: Ghc</label>
              <input type="number" class="form-control" id="inputprice" name="book_price" value="<?php echo $book_arr['book_price']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="book_desc"><?php echo $book_arr['book_desc']; ?></textarea>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputauthor">Author</label>
              <select name="book_author" id="inputauthor" class="form-control">
                <option value="<?php echo $book_arr['author_id']; ?>" selected><?php echo $book_arr['author_name']; ?></option>
                <?php
                  foreach($author_arr as $data){
                ?>
                  <option value="<?php echo $data['author_id']; ?>"><?php echo $data['author_name']; ?></option>
                  <?php
                  }
                  ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="inputgenre">Genre</label>
              <select id="inputgenre" class="form-control" name="book_genre">
                <option selected value="<?php echo $book_arr['genre_id']; ?>"><?php echo $book_arr['genre_name']; ?></option>
                <?php
                  foreach($genre_arr as $data){
                ?>
                  <option value="<?php echo $data['genre_id']; ?>"><?php echo $data['genre_name']; ?></option>
                  <?php
                  }
                  ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputpublisher">Publisher</label>
              <input type="text" class="form-control" id="inputpublisher" name="book_publisher" value="<?php echo $book_arr['publisher']; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="inputyear">Published Year</label>
              <input type="number" class="form-control" id="inputyear" name="book_pub_year" value="<?php echo $book_arr['published_year']; ?>">
            </div>
          </div>
          <div class="form-group">
              <label for="inputstock">Stock</label>
              <input type="number" class="form-control" id="inputstock" name="book_stock" value="<?php echo $book_arr['stock']; ?>">
            </div>
            <div class="form-group">
            <label for="exampleFormControlFile1">Cover Image</label>
            <input type="file" class="form-control-file" name="book_image" id="exampleFormControlFile1">
            <input type="hidden" name="isbn" value="<?php echo $book_arr['isbn']; ?>">
            <input type="hidden" name="book_img" value="<?php echo $book_arr['book_image']; ?>">
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Update Book</button>
        </form>
      </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>
