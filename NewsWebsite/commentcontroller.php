<?php 
require_once'connect.php'
?>
<?php

if(isset($_POST['gui'])){
    $email=$_POST['email'];
    $noidung=$_POST['noidung'];
    $id=$_POST['id'];
 
    $sql="INSERT INTO binh_luan(email,noidungbinhluan,post_id) values('$email',N'$noidung','$id')";
    mysqli_query($conn,$sql);
    
    header("Location:index.php?manage=news&id=$id");
}
?>