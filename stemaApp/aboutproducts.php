<html>
  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stemaApp.css">
    <script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
    <script type="text/javascript" src="stemaApp.js"></script>

  </head>

  <body>

<table width="500px" class="center" cellspacing="0">
<tr class="scolor">
    <td>

      <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn" width="100%" height="100%">
          <img src="burger-menu.png" width="50px" height="35px" class="bar">
          </button>

        <div id="myDropdown" class="dropdown-content">
          <img src="menuIcons/immage.png" width="170px" height="170px" class="icenter" >
          <hr color="black" class="hrsmenu">
          <a href="stemaApp.php"> <img src="menuIcons/home.png" class="ico"> &nbsp;&nbsp; Home</a>
          <hr color="black" class="hrsmenu">
          <a href="login/login.html"> <img src="menuIcons/log-in.png" class="ico"> &nbsp;&nbsp; Log In</a>
          <hr color="black" class="hrsmenu">
          <a href="nutrifacts/nutrifacts.html"> <img src="menuIcons/nutritional-fact.png" class="ico"> &nbsp;&nbsp; Nutritional Facts</a>
          <hr color="black" class="hrsmenu">
          <a href="allergies/allergies.php"> <img src="menuIcons/allergies.png" class="ico"> &nbsp;&nbsp; Allergies</a>
          <hr color="black" class="hrsmenu">
          <a href="Additives/additives.html"> <img src="menuIcons/Additives.png" class="ico"> &nbsp;&nbsp; Additives</a>
          <hr color="black" class="hrsmenu">
          <a href="info/info.html"> <img src="menuIcons/info.png" class="ico"> &nbsp;&nbsp; Info</a>
          <hr color="black" class="hrsmenu">

        </div>
      </div>
  </td>

    <td>
   <p align="middle" style="font-family:Magneto;font-size:32px" > S t e m a </p>
    </td>
<td>
 <!-- <img src="nutritioniste.png" width="110px" height="55px" class="icenter"> -->
</td>
</tr>
<?php if(isset($_GET["code"]))$barcode = $_GET["code"]?>
<tr>
    <td>
      <div >
      <input type="image" src="searchicon.png"width="45px" height="45px" class="icenter" alt="MenuIcon" onclick="getitems()">
    </td>
    <td align="middle">
      <input style="font-size:22px;" type="text" class="hb" name="itemSearched" id="searchinput"  width="350px" placeholder="Start Typing...">
    </div>
    </td>
    <td>

        <a href="scanPage\scanpage.html">
      <img src="scan.png" width="95px" height="57px" class="icenter" style="margin-top: 10px;">
    </a>

    </td>
</tr>
</table>

<hr color="FF7500" width="496px">

<?php include("db_connection.php");

 $productName = $_GET["prod"];

// echo"$productName . S ";

 $sql = "SELECT * FROM products WHERE product_name = '{$productName}' ";
 $result = mysqli_query($conn, $sql);
 $product = mysqli_fetch_assoc($result);
?>
<!-- <div > -->

<table class="dicenter" style="width:500px" cellspacing="0">
  <tr>
<td style="background-color: #6fb792; border-top:5px solid #018142; border-bottom:5px solid #018142;">
<?php echo"<h2 style='text-align: center; margin: 12px 0px; font-size: 28px;'>{$product['product_name']}</h2>"; ?>
</td>
<td style="background-color: #6fb792; border-top:5px solid #018142; border-bottom:5px solid #018142;">
<img alt="" id="fave"  src="menuIcons/heart-empty.png">
</td>
</tr>
<tr><td colspan="2">
 <?php echo"<img src='{$product['products_img']}' class='icenter2' width='20%' max-height='150px'>"; ?>
</td></tr>
<tr><td colspan="2">
<?php echo"<h3 class='subtitle'>Nutriscore Classification </h3> <p class='info'> {$product['nutriscore_classification']} </p>"; ?>
</td></tr>
<tr><td colspan="2">
<?php echo"<h3 class='subtitle'>Nutritional Scale </h3>
 <ul class='ullist'>
     <li class='info'>Fat/ lipids: {$product['fat_lipids']}g</li>
     <li class='info'>Satured fat: {$product['satured_fat']}g</li>
     <li class='info'>Sugars: {$product['sugars']}g</li>
     <li class='info'>Salt: {$product['salt']}g</li>
 </ul>"; ?>
</td></tr>
<tr><td colspan="2">
<?php echo"<h3 class='subtitle'>Ingredients </h3> <p class='info'>{$product['Ingredients']}</p>"; ?>
</td></tr>
<tr><td colspan="2">
<?php echo"<h3 class='subtitle'>Allergic contents </h3> <p class='info'> {$product['Allergens']}</p>"; ?>
</td></tr>
</table>


</body>
</html>
