<?php
require("../settings/core.php");
require("../controllers/product_controller.php");
$genre_arr = display_genres_fxn();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Genres</title>
  </head>
  <body>
    <div class="container">
      <h1>Genres</h1>
    <h6>Add New Genre</h6>

    <form method="post" action="../functions/genre_add.php">
      <div class="form-row">
        <div class="form-group col-md-6">
          <input type="text" class="form-control" id="genrename" name="name" placeholder="Genre">
        </div>
        <div class="form-group col-md-6">
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
      </div>
</form>
    <ul class="list-group">
    <?php
     foreach($genre_arr as $data){
    ?>
        <li class="list-group-item"><?php echo $data['genre_name']; ?>
        <a href="<?php echo '../functions/genre_delete.php?id='.$data['genre_id']; ?>" class="btn btn-danger float-right mx-sm-3">Delete</a>
        <a href="<?php echo 'genre_update.php?id='.$data['genre_id'] ?>" class="btn btn-primary float-right">Update</a>

        </li>
    <?php } ?>
</ul>

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

