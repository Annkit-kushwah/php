<?php

session_start();
$connection = mysqli_connect('localhost', 'root', '', 'ankit');
if($_POST){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $q = mysqli_query($connection , "SELECT * FROM tbl_ankit WHERE email = '{$email}'");

    $count = mysqli_num_rows($q);

    if($count>0){
        $_SESSION['email'] = $email;
        $row = mysqli_fetch_array($q);
        $varify = password_verify($password , $row['password']);
        if($varify == 1){
           header('Location:display.php');
        }
        else{
            echo "<script>alert('password is inccoret')</script>";
        }
    }else{
echo "<script>alert('email is not exixst')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login  Form</title>
</head>
<body>
    <form action="" method="post"  enctype="multipart/form-data" id="myform">  


Email : <input type="email" name="email" placeholder="Enter Your email" required> <br><br>

password : <input type="password" name="password" placeholder="Enter Your password" required> <br><br>



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