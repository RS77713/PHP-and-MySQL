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
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
    <h1>Add Product:</h1>
    <div class="header-right">
    <div class="navbar navbar-default navbar-fixed-top"><!--top fixed -->
        <div class="container">
            <table cellspacing="5" celsspadding="5"><!--seperate linetabulas type nav + take of borders and add spacing-->
              <tr><!--table row-->
              <td><a href="index.php">ProductList</a></td><!--table cell-->
              <td><a class="selected" href="#">AddProduct</a></td>
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
    <div class="container">
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

    <div class="table-wrapper">
      <table>
      <form action="database.php" method="POST">
        <thead>
          <tbody class+"align-center">
            <td>
            <label>ID</label>
              <input type="text" name="id" value= <?php echo $id; ?> >
            </td>
            <tr></tr>
            <td>
            <label>Img</label>
              <input type="file" name="img" value= <?php echo $img; ?> >
            </td>
            <tr></tr>
            <td>
              <label>SKU</label>
              <input type="text" name="sku" value= <?php echo $sku; ?>>
            </td>
            <tr></tr>
            <td>
              <label>Name</label>
              <input type="text" name="name" value= <?php echo $name; ?> >
            </td>
            <tr></tr>
            <td>
              <label>OldPrice</label>
              <input type="text" name="old_price" value= <?php echo $old_price; ?> >
            </td>
            <tr></tr>
            <td>
              <label>Price</label>
              <input type="text" name="price" value= <?php echo $price; ?> >
            </td>
            <tr></tr>
            <td>

              <script type="text/javascript">
                  function EnableDisableTextBox(ddlModels) {
                      var selectedValue = product.options[product.selectedIndex].value;
                      var txtOther = document.getElementById("txtOther");
                      txtOther.disabled = selectedValue == 4 ? false : true;
                      if (!txtOther.disabled) {
                          txtOther.focus();
                      }
                  }
              </script>
              <span>Product category</span>
              <select id = "product" onchange = "EnableDisableTextBox(this)">
                  <option value = "1">Blank</option>
                  <option value = "2">Disc</option>
                  <option value = "3">Furniture</option>
                  <option value = "4">Other</option>
              </select>
              <br />
              <!--Other-->
              <input type="text" id="txtOther" disabled="disabled" />

          </tbody>
          <td>
          <div>
            <button type="submit" class="btn btn-primary" name="save">Save</button>
          </div>
        </td>
        </thead>
      </form>
      </table>
      </div>
    </div>

<!--INCLUDE OTHER PHP FILES -->

    <!--Footer start -->
    <?php
    include ("footer.php");
    ?>
  </body>
</html>
