<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="css/style2.css">
<title>Title</title>
</head>
<body>

<?php
  $con= mysqli_connect("localhost","root","","myfirstwebsite") or die(mysqli_error($con));
if(isset($_POST['submit'])){


$email=mysqli_real_escape_string($con,$_POST['email']);

$password=mysqli_real_escape_string($con,$_POST['password']);


$select_querry="SELECT * FROM userspage WHERE email='$email'";


$select_querry_result=mysqli_query($con,$select_querry);
$result=mysqli_fetch_assoc($select_querry_result);
$_SESSION["username"]=$result["fname"];
$pass=$result["upassword"];
echo $result["upassword"];
if(mysqli_num_rows($select_querry_result)>0){
        if(!password_verify($password,$result["upassword"])){
            ?>
       <script> 
    location.replace("home.php");
       </script>
       <?php
        }else{
            echo "pass word is wrong";
        }
    }


else{
echo "there is no account";
}



}
?>
<div class="bacimg">
<div class="bac">
    <h1 class="d-flex justify-content-center">LOGIN</h1>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post">

  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" autocomplete="off">
  </div>

  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password" autocomplete="off">
  </div>
  <center>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </center>
</form>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>