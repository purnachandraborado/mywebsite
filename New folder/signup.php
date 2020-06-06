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

$name=mysqli_real_escape_string($con,$_POST['name']);
$email=mysqli_real_escape_string($con,$_POST['email']);
$phone=mysqli_real_escape_string($con,$_POST['phone']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$cpassword=mysqli_real_escape_string($con,$_POST['cpassword']);

$pass=password_hash($password,PASSWORD_DEFAULT);
$cpass=password_hash($cpassword,PASSWORD_DEFAULT);

$select_querry="SELECT * FROM userspage WHERE email='$email'";

$insert_querry="INSERT INTO userspage(fname, email, phone, upassword, confirmpassword) VALUES ('$name','$email','$phone','$pass','$cpass')";

$select_querry_res=mysqli_query($con,$select_querry);

if(mysqli_num_rows($select_querry_res)>0){
  echo "email already present";
}else{
  if($password===$cpassword){
    $quer=mysqli_query($con,$insert_querry);
    header("location:login.php");
  }
  else{
    echo "pass word not matching";
  }
}


}
?>
<div class="bacimg">
<div class="bac">
    <h1 class="d-flex justify-content-center">SIGNUP</h1>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" placeholder="Enter name" id="name" name="name" autocomplete="off">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" autocomplete="off">
  </div>
  <div class="form-group">
    <label for="phone">Phone:</label>
    <input type="text" class="form-control" placeholder="Enter phone" id="phone" name="phone" autocomplete="off">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password" autocomplete="off">
  </div>
  <div class="form-group">
    <label for="cpwd">Confirm password:</label>
    <input type="password" class="form-control" placeholder="Confirm password" id="cpwd" name="cpassword" autocomplete="off">
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