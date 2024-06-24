<?php

session_start();
$connection = mysqli_connect('localhost', 'root', '', 'ankit');

if(isset($_GET['did'])){

     $did = $_GET['did'];

$imgdelete = mysqli_query($connection, "select * from tbl_ankit where id = '{$did}'");
$row = mysqli_fetch_array($imgdelete);
unlink( $row['image']);


     $dq = mysqli_query($connection, "delete from tbl_ankit where id = '{$did}'");

     if($dq){
        echo "<script>alert('Record delete')</script>";
     }

}

if($_SESSION['email'] == true){



$q = mysqli_query($connection , 'SELECT * FROM tbl_ankit');

echo "<table border = '1'>";

echo "<tr>";
echo "<td>ID</td>";
echo "<td>Name</td>";
echo "<td>Email</td>";
echo "<td>phone</td>";
echo "<td>Gender</td>";
echo "<td>Hobby</td>";
echo "<td>Cars</td>";
echo "<td>Image</td>";
echo "<td>Address</td>";
echo "<td>Action</td>";
echo "</tr>";
while ($row = mysqli_fetch_array($q)) {
    
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['name']}</td>";
    echo "<td>{$row['email']}</td>";
    echo "<td>{$row['phone']}</td>";
    echo "<td>{$row['gender']}</td>";
    echo "<td>{$row['hobby']}</td>";
    echo "<td>{$row['cars']}</td>";
    
    echo "<td> <img src='{$row['image']}' height='90px' width='90px'></td>";
    
    echo "<td>{$row['address']}</td>";

    echo "<td><a href='edit.php?eid={$row['id']}'> Edit</a> | <a href='display.php?did={$row['id']}'> Delete</a></td>";
    echo "</tr>";
}
echo "</table>";

}
else{
    header("Location:login.php");
}



?>
