<html>
<body>
  <?php

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $link = mysqli_connect("localhost", "root", "", "stema");

  if($link === false){

      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

  $phone = $_POST["phone"];
  $password = $_POST["psw"];

  $found = false;
  $wrong_password = true;

  $sql = "SELECT phone, password FROM users_signup";
  $result = mysqli_query($link, $sql);

  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

    if($phone == $row['phone']){
      $found = true;
      if($password == $row['password']){
        $wrong_password = false;
      }
      else{
        $wrong_password = true;

      }
    }else{
        $found = false;
    }
    }
  if($found == true){
    if($wrong_password == false){
      echo ("WELCOME TO STEMA APP!");
    }
    else{
    $message2 = "Wrong password for the Phone number:  " . $phone;
    echo "<script type='text/javascript'>alert('$message2');</script>";

    }
  }

  else{

    $message3 = "This Phone number is not registered yet, please SIGN UP.";
    echo "<script type='text/javascript'>alert('$message3');</script>";
  }

  mysqli_close($link);
  ?>

</body>
</html>
