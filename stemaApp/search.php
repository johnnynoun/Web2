<html>
<body>
  <head>
      <link rel="stylesheet" type="text/css" href="stemaApp.css">
      <script type="text/javascript" src="stemaApp.js"></script>
  </head>

<?php include("db_connection.php");
if(!isset($_POST['itemSearched']) ){
  echo "no search field";
  exit();}
   $conn = OpenCon();
    $sql = "SELECT * FROM Products WHERE product_name  LIKE '%".$_POST['itemSearched']."%' ORDER BY nutriscore, product_name";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
     while($row = $result->fetch_assoc()) {

        ?>  <div class="dicenter" style="width:500px; border: solid black 8px; border-color:<?php echo $row['Colors']; ?>;">


          <table>
            <tr>
              <td width="100px">
          <p style="padding: 0px 20px; font-family: Arial; color: <?php echo $row['Colors']; ?>; vertical-align: bottom; align:left; font-size: 60px"><?php echo $row['nutriscore']; ?></p>
        </td>
          <td width="400px">
          <a href="./aboutproducts.php?prod=<?php echo "{$row['product_name']}";?>"style="color: black;font-weight: bold;text-decoration:none;"><p style="margin:0px; justify-content: start;  vertical-align: top; font-size:25px">
                 <?php
                echo"{$row['product_name']}"; ?></p></a><p style="margin:0px; color:black; font-size:25px; text-align: right; padding-right:20px;"><?php echo "{$row['Description']}"; ?></p>
            </td>
          </tr>
        </table>
    </div>
    <div class="dicenter" style="width:500px; height:5px;">
      <p>
      </p>
    </div>

<?php
}

    }
    else{
        echo "No result Found";
    }
    ?>
</body>
</html>
