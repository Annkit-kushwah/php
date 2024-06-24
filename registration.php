<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '', 'ankit');

if($_POST){
    $name = $_POST['name'];
    $email = $_POST['email'];

    $password = $_POST['password'];
    $password1 = password_hash($password , PASSWORD_BCRYPT);

    $phone = $_POST['phone'];
    $gender = $_POST['gender'];


  $hobby = $_POST['hobby'];
  $hobby1 = implode(',', $hobby);

    $cars = $_POST['cars'];



  $img = $_FILES['image']['name'];
  $tmp = $_FILES['image']['tmp_name'];
  $folder = 'image/' . $img;

  move_uploaded_file($tmp , $folder);

    $address = $_POST['address'];


$enailq = mysqli_query($connection , "SELECT * FROM tbl_ankit where email = '{$email}'");

$count = mysqli_num_rows($enailq);

if($count>0){
    echo "<script>alert('Email is alreay taken')</script>";
}
else {

    $q = mysqli_query($connection , "insert into tbl_ankit (name , email , password , phone, gender, hobby, cars, image, address) values('{$name}','{$email}','{$password1}','{$phone}','{$gender}','{$hobby1}','{$cars}','{$folder}','{$address}')");
    
    if($q){
        echo "<script>alert('Record Added');window.location='login.php'</script>";
    }
}



}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rwgistration Form</title>
</head>
<body>
    <form action="" method="post"  enctype="multipart/form-data" id="myform">  

Name : <input type="text" name="name" placeholder="Enter Your name" required> <br><br>
Email : <input type="email" name="email" placeholder="Enter Your email" required> <br><br>
password : <input type="password" name="password" placeholder="Enter Your password" required> <br><br>

Phone : <input type="number" name="phone" id="" placeholder="Enter Your phone" required><br><br>
Gender : <input type="radio" name="gender" Value="male" id="" checked >Male
 <input type="radio" name="gender" Value="female" id="">Female<br><br>

 Hobby : <input type="checkbox" name="hobby[]" value="singing" id="" required >singing
<input type="checkbox" name="hobby[]" value="dancing" id="">Dancing
<input type="checkbox" name="hobby[]" value="reading" id="">Reading<br><br>

cars : <select name="cars" id="" required>
    <option value="select">select</option>
    <option value="bmw">Bmw</option>
    <option value="audi">Audi</option>
    <option value="benz">Benz</option>
    <option value="swift">Swift</option>
</select><br><br>

image : <input type="file" name="image" id="" required><br><br>

Address : <textarea name="address" id="" placeholder="Enter Address" required></textarea><br><br>

<input type="submit" value="submit">
<input type="reset" value="reset">
    </form>
</body>



<script  src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js "></script>

<script>
    $(document).ready(function(){
        $('#myform').validate();
    })

</script>
<style>
    .error{
        color : red;
    }
</style>
</html>