<?php
include("koneksi.php");
if(isset($_POST['daftar'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];
    $tmptl=$_POST['tmptl'];
    $tgl=$_POST['tgl'];

    $sql = "INSERT INTO user (username,password,tmptl,tgl) 
    VALUES ('$username','$password','$tmptl','$tgl')";

    $query = mysqli_query ($koneksi, $sql);

    if($query){
        header('Location:index.php?status=sukses');
    }else{
        header('Location:index.php?status=gagal');
    }
}
?>


