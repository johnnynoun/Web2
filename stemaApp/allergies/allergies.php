<html>
  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../stemaApp.css">
    <link rel="stylesheet" type="text/css" href="allergie.css">
    <script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
    <script type="text/javascript" src="../stemaApp.js"></script>

  </head>

  <body>

<table width="500px" class="center" cellspacing="0">
<tr class="scolor">
    <td>

      <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn" width="100%" height="100%">
          <img src="../burger-menu.png" width="50px" height="35px" class="bar">
          </button>

        <div id="myDropdown" class="dropdown-content">
          <img src="../menuIcons/immage.png" width="170px" height="170px" class="icenter" >
          <hr color="black" class="hrsmenu">
          <a href="../stemaApp.php"> <img src="../menuIcons/home.png" class="ico"> &nbsp;&nbsp; Home</a>
          <hr color="black" class="hrsmenu">
          <a href="../login/login.html"> <img src="../menuIcons/log-in.png" class="ico"> &nbsp;&nbsp; Log In</a>
          <hr color="black" class="hrsmenu">
          <a href="../nutrifacts/nutrifacts.html"> <img src="../menuIcons/nutritional-fact.png" class="ico"> &nbsp;&nbsp; Nutritional Facts</a>
          <hr color="black" class="hrsmenu">
          <a href="../Additives/additives.html"> <img src="../menuIcons/Additives.png" class="ico"> &nbsp;&nbsp; Additives</a>
          <hr color="black" class="hrsmenu">
          <a href="../info/info.html"> <img src="../menuIcons/info.png" class="ico"> &nbsp;&nbsp; Info</a>
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
      <input type="image" src="../searchicon.png"width="45px" height="45px" class="icenter" alt="MenuIcon" onclick="getitems()">
    </td>
    <td align="middle">
      <input style="font-size:22px;" type="text" class="hb" name="itemSearched" id="searchinput"  width="350px" placeholder="Start Typing...">
    </div>
    </td>
    <td>

        <a href="../scanPage/scanpage.html">
      <img src="../scan.png" width="95px" height="57px" class="icenter" style="margin-top: 10px;">
    </a>

    </td>
</tr>
</table>

<hr color="FF7500" width="496px">


<?php

include("../db_connection.php");
    $query = "SELECT * FROM ingredient_allergy ";
    $results = mysqli_query($conn, $query);
    $chars = [];
        while ($row = mysqli_fetch_assoc($results)) {
            $first_char = substr($row['ingredientName'], 0, 1);
             if(!(in_array( $first_char, $chars))) {
                   array_push( $chars, $first_char);
             }
        }
    //     echo '<div class="letters-reference">';
    // foreach($chars as $char) {
    //     echo '<a href="#'.$char.'" style="margin-right: 20px;" >'.strtoupper($char).'</a>';
    // }
    // echo '</div>';

    foreach($chars as $char) {
      ?>
      <div class="dicenter" width="500px">
        <!-- <table>
          <tr>
            <td> -->
      <?php
        echo '<h2 style="padding-left: 20px; margin-bottom: 0;" id="'.$char.'"> '.strtoupper($char).' </h2>'; ?>
      <!-- </td> </tr>
      <tr><td> -->
      <?php
        echo '<hr class="dicenter">'; ?>
      <!-- </tr> </td> -->
    <?php
        $results = mysqli_query($conn, $query);
        while ( $row_ingredient = mysqli_fetch_assoc($results) ) {
            $name = $row_ingredient['ingredientName'];
            $first_char = substr($name, 0, 1);

            if($first_char == $char) {
                $image_query = "SELECT * FROM ingredient WHERE ingredient_name ='$name' ORDER BY ingredient_name";
                $image_result = mysqli_query($conn, $image_query);
                $res = mysqli_fetch_assoc($image_result);
                $image = $res['image'];
                echo
                '<div class="dicenter" id="'.strtolower($name).'">';
                if(isset($image)) {
                 echo '<img alt="" style="display: flex; width:20%; max-height: 150px;" src="data:image/jpeg;base64,'.base64_encode( $image ).'"/>';
                 }
                 echo ' <h3 class="allergy-title">'.ucfirst($name).' </h3>';
                 echo ' <div class="allergy_info">'.ucfirst($row_ingredient['allergy_info']).' </div>';
                echo '</div>';
                echo'<hr class="dicenter">';
             }
            }
            ?>

          </div>
          <?php
}
?>
</body>
</html>
