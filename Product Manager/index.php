<!DOCTYPE html>
<html lang="en">
  <head>
    <title> Edgars Shop</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scaleable=no">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/headerNavigation.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
}
</style>
  </head>
  <body>
    <h1>Product List</h1>
    <div class="header-right">
    <div class="navbar navbar-default navbar-fixed-top"><!--top fixed -->
        <div class="container">
            <table cellspacing="5" celsspadding="5"><!--seperate linetabulas type nav + take of borders and add spacing-->
              <tr><!--table row-->
                <td><a class="selected" href="#">ProductList</a></td><!--table cell-->
                <td><a href="addProduct.php">AddProduct</a></td>
              </tr>
            </table>
        </div>
      </div>
    </div>


    <?php require_once 'database.php'; ?>

    <?php if (isset($_SESSION['message'])): ?>

     <div class="alert alert-<?=$_SESSION['msg_type']?>">

       <?php
          echo $_SESSION['message'];
          unset($_SESSION['message']);
        ?>
      </div>
    <?php endif ?>

    <?php
      $mysqli = new mysqli('localhost', 'root', '','database') or die (mysqli_error($mysqli));
      $result = $mysqli->query("SELECT * FROM tbl_products") or die($mysqli->error);
      //pre_r($result);

      function pre_r( $array ) {
          echo '<pre>';
          print_r($array);
          echo '</pre>';
      }
     ?>
        <?php $i=0; while ($row = $result->fetch_assoc()): ?>


                <div class="row">
                  <div class="column">
                      <div class="card">
                        <form action="index.php" method="post">
                            <tbody>
                            <?php if (0 == ++$i % 3) { ?>
                              <tr>
                            <?php } ?>
                              <?php
                              {
                                echo "<tr>";
                                echo "<td><input type='checkbox' name='checkbox[]' value='".$row['id']."'></td>";
                                echo "</tr>";
                              }
                              echo "</table>";
                            ?>
                              <td><h6 class="sku"><?php echo $row['sku']; ?></h6></td>
                              <td><class="id">ID-<?php echo $row['id']; ?></td>
                              <td><img src="<?php echo $row['img']; ?>" alt="image" class="img-fluid card-img-top"></td>
                              <td><h3><?php echo $row['name']; ?></h3></td>
                              <td><p class="old_price"><s>€<?php echo $row['old_price']; ?></s></p></td>
                              <td><p class="price">€<?php echo $row['price']; ?></p></td>
                              <td><p>Some text product..</p></td>
                              <td><h6 class="product"><?php echo $row['product']; ?></h6></td>
                              </tr>
                          </tbody>
                      </div>
                    </div>
                    <div class="column">
                        <div class="card">
                          <form action="index.php" method="post">
                              <tbody>
                              <?php if (0 == ++$i % 3) { ?>
                                <tr>
                              <?php } ?>
                                <?php
                                {
                                  echo "<tr>";
                                  echo "<td><input type='checkbox' name='checkbox[]' value='".$row['id']."'></td>";
                                  echo "</tr>";
                                }
                                echo "</table>";
                              ?>
                                <td><h6 class="sku"><?php echo $row['sku']; ?></h6></td>
                                <td><class="id">ID-<?php echo $row['id']; ?></td>
                                <td><img src="<?php echo $row['img']; ?>" alt="image" class="img-fluid card-img-top"></td>
                                <td><h3><?php echo $row['name']; ?></h3></td>
                                <td><p class="old_price"><s>€<?php echo $row['old_price']; ?></s></p></td>
                                <td><p class="price">€<?php echo $row['price']; ?></p></td>
                                <td><p>Some text product..</p></td>
                                <td><h6 class="product"><?php echo $row['product']; ?></h6></td>
                                </tr>
                            </tbody>
                        </div>
                      </div>
                      <div class="column">
                          <div class="card">
                            <form action="index.php" method="post">
                                <tbody>
                                <?php if (0 == ++$i % 3) { ?>
                                  <tr>
                                <?php } ?>
                                  <?php
                                  {
                                    echo "<tr>";
                                    echo "<td><input type='checkbox' name='checkbox[]' value='".$row['id']."'></td>";
                                    echo "</tr>";
                                  }
                                  echo "</table>";
                                ?>
                                  <td><h6 class="sku"><?php echo $row['sku']; ?></h6></td>
                                  <td><class="id">ID-<?php echo $row['id']; ?></td>
                                  <td><img src="<?php echo $row['img']; ?>" alt="image" class="img-fluid card-img-top"></td>
                                  <td><h3><?php echo $row['name']; ?></h3></td>
                                  <td><p class="old_price"><s>€<?php echo $row['old_price']; ?></s></p></td>
                                  <td><p class="price">€<?php echo $row['price']; ?></p></td>
                                  <td><p>Some text product..</p></td>
                                  <td><h6 class="product"><?php echo $row['product']; ?></h6></td>
                                  </tr>
                              </tbody>
                          </div>
                        </div>
                        <div class="column">
                            <div class="card">
                              <form action="index.php" method="post">
                                  <tbody>
                                  <?php if (0 == ++$i % 3) { ?>
                                    <tr>
                                  <?php } ?>
                                    <?php
                                    {
                                      echo "<tr>";
                                      echo "<td><input type='checkbox' name='checkbox[]' value='".$row['id']."'></td>";
                                      echo "</tr>";
                                    }
                                    echo "</table>";
                                  ?>
                                    <td><h6 class="sku"><?php echo $row['sku']; ?></h6></td>
                                    <td><class="id">ID-<?php echo $row['id']; ?></td>
                                    <td><img src="<?php echo $row['img']; ?>" alt="image" class="img-fluid card-img-top"></td>
                                    <td><h3><?php echo $row['name']; ?></h3></td>
                                    <td><p class="old_price"><s>€<?php echo $row['old_price']; ?></s></p></td>
                                    <td><p class="price">€<?php echo $row['price']; ?></p></td>
                                    <td><p>Some text product..</p></td>
                                    <td><h6 class="product"><?php echo $row['product']; ?></h6></td>
                                    </tr>
                                </tbody>
                            </div>
                          </div>
                  </div>
                </div>
      <?php endwhile ?>

        <input type="submit" name="delete" id="delete" value="Delete Records">
        </form>
<!--INCLUDE OTHER PHP FILES -->


    <!--Footer start -->
    <?php
    include ("footer.php");
    ?>
  </body>
</html>
