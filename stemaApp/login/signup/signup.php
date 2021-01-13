
<html>
<body>
<?php



$link = mysqli_connect("localhost", "root", "", "stema");

  $name = $_POST["name"];

  $phone = $_POST["phone"];

  $email = $_POST["email"];

 $password = $_POST["password"];


 $query = "select phone from users_signup WHERE phone = '$phone'";

 $res_e = mysqli_query($link, $query);

 if (mysqli_num_rows($res_e) > 0){

   $message = "Sorry this phone is already taken";
 echo "<script type='text/javascript'>alert('$message');</script>";

 }
 else{
 $sql = "INSERT INTO users_signup (id, name, phone, email, password) VALUES (NULL, '".$name."' , '".$phone."' , '".$email."' , '".$password."')";
 echo ($sql);
 if(mysqli_query($link, $sql)){

    $signup = true;

     $message2 = "User succesfully created";
     echo "<script type='text/javascript'>alert('$message2');</script>";

     header('location: ../login.html');
 }else{
   $signup = false;
   echo("user could not be created, please try again later.");
 }
 }

mysqli_close($link);



?>
</body>
</html>
