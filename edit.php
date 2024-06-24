<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '', 'ankit');

$eid = $_GET['eid'];

$eq = mysqli_query($connection , "SELECT * FROM tbl_ankit WHERE id = '{$eid}'");

$row = mysqli_fetch_array($eq);

$hobby = $row['hobby'];
$hooby = explode(',', $hobby);

if($_POST){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
  $hobby = $_POST['hobby'];
  $hobby1 = implode(',', $hobby);
    $cars = $_POST['cars'];


if($_FILES['image']['name']!=""){

    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $folder = 'image/' . $img;
    
    move_uploaded_file($tmp , $folder);


    $imgdelete = mysqli_query($connection, "select * from tbl_ankit where id = '{$eid}'");
$row = mysqli_fetch_array($imgdelete);
unlink( $row['image']);
}
else{
    $folder = $_POST['old-image'];
}


    $address = $_POST['address'];

    $q = mysqli_query($connection , "update tbl_ankit set name='{$name}' , email='{$email}', phone='{$phone}', gender = '{$gender}' , hobby = '{$hobby1}' , cars = '{$cars}' , image='{$folder}' , address='{$address}'  where id = '{$eid}'");
    
    if($q){
        echo "<script>alert('Record Updated');window.location='display.php'</script>";
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

Name : <input type="text" name="name" value="<?php echo $row['name']  ?>" placeholder="Enter Your name" required> <br><br>
Email : <input type="email" name="email" value="<?php echo $row['email']  ?>" placeholder="Enter Your email" required> <br><br>

Phone : <input type="number" name="phone" id="" value="<?php echo $row['phone']  ?>" placeholder="Enter Your phone" required><br><br>
Gender : <input type="radio" name="gender" Value="male" 


<?php

if($row['gender'] == 'male'){
    echo 'checked';
}
?>





>Male
 <input type="radio" name="gender" Value="female" id=""
 
 <?php

if($row['gender'] == 'female'){
    echo 'checked';
}
?>
 
 
 
 
 >Female<br><br>

 Hobby : <input type="checkbox" name="hobby[]" value="singing" id="" 
 
 
 <?php
if(in_array('singing', $hooby)){
    echo 'checked';
}


?>
 
 
 
 
 >singing
<input type="checkbox" name="hobby[]" value="dancing" id=""


<?php
if(in_array('dancing' , $hooby)){
    echo 'checked';
}


?>




>Dancing
<input type="checkbox" name="hobby[]" value="reading" id=""

<?php
if(in_array('reading' , $hooby)){
    echo 'checked';
}


?>


>Reading<br><br>

cars : <select name="cars" id="" required>
    <option value="bmw"
    
    <?php

if($row['cars'] == 'bmw'){
    echo 'selected';
}
?>
    
    
    
    >Bmw</option>
    <option value="audi" <?php

if($row['cars'] == 'audi'){
    echo 'selected';
}
?>
    >Audi</option>
    <option value="benz" <?php

if($row['cars'] == 'benz'){
    echo 'selected';
}
?>
    >Benz</option>
    <option value="swift" <?php

if($row['cars'] == 'swift'){
    echo 'selected';
}
?>
    >Swift</option>
</select><br><br>

 <input type="hidden" name="old-image" value="<?php echo $row['image'] ?>">

old image : <img src="<?php echo $row['image'] ?>" height="90px"  width="90px" alt="" srcset="">  <br><br>

Select New image : <input type="file" name="image" id="" ><br><br>

Address : <textarea name="address" id="" placeholder="Enter Address" required>
    <?php echo $row['address']  ?>
</textarea><br><br>

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