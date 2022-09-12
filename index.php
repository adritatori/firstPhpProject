<?php
$insert==false;
if(isset($_POST['name'])){


    $server = 'localhost';
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
      die("connection to this database failed due to".mysqli_connect_error());
    }
    //echo "Success conneccting to the db";

    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `firstphp`.`data` (`name`, `age`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$email', '$phone', '$desc', current_timestamp());";
   // echo $sql;

    if($con->query($sql)==true){
      $insert = true;
     // echo "Successfully inserted";
    }else{
      echo "ERROR: $sql <br> $con->error";
    }

    $con->close();}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>MyTravelForm</title>
</head>
<body>
  <div class="container">
    <h3>
      Welcome to Dhaka Mohila Polytechnic Insitute
    </h3>
    <p>
      Enter your details to confirm your participation in the trip. 

    </p>
    <?php 
    if($insert==true){
    echo "  <p class='submitMsg'>
      Thanks for submitting your form . We are happy to see you joining us for the us trip. 
    </p>";
    }
  
  ?>
    <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <input type="text" name="age" id="age" placeholder="Enter your age">
        <input type="text" name="email" placeholder="Enter your email">
        <input type="text" name="phone" placeholder="Enter your phone">
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here">
          </textarea>
          <button class="btn btn-submit">Submit</button>
         

    </form>
  </div>
  
</body>
</html>