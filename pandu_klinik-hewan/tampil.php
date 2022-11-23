

<html>
<body>
<?php
    session_start();
    if($_SESSION['status']!="login"){
        header("location:../index.php?pesan=belum_login");
    }
?>
    <h3> selamat datang, <?php echo $_SESSION['username']; ?>! anda telah login.

    
    <h1> DATA HEWAN </h1>
    <?php
include("koneksi.php");
?>

    <form action="tampil.php" method="GET">
	<input type="text" name="cari">
	<input type="submit" value="Cari">         
</form>
<?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>

    <table border="1">
    <tr>
        <th>no</th>
        <th>nama pemilik</th>
        <th>jenis hewan</th>
        <th>keluhan</th>
    </tr>


    <h4><a href="tambah.php">tambah</a></h4>
    <?php
    include("koneksi.php");

    if(isset($_GET['cari'])){

    $sql="SELECT * FROM tb_rsh where nama like '%".$cari."%'";
    $query = mysqli_query($koneksi, $sql);
    
    }else{		
    $sql="SELECT * FROM tb_rsh";
    $query=mysqli_query($koneksi, $sql);
    }

    while($rsh=mysqli_fetch_array($query)){
        echo "<tr>";
echo"<td>".$rsh['id']."</td>";
echo"<td>".$rsh['nama']."</td>";
echo"<td>".$rsh['jenis']."</td>";
echo"<td>".$rsh['keluhan']."</td>";
echo "<td>";
echo "<a href='edit.php?id=".$rsh['id']."'>Edit</a> |";
echo "<a href='hapus.php?id=".$rsh['id']."'>Hapus</a>";
echo "</td>";
echo"</tr>";

    }

    ?>
    <a href="logout.php">logout
    </table>
    
</body>
<body>
<td><input type="button" value="back" onclick="history.back(-1)"/>
</body>
</html>