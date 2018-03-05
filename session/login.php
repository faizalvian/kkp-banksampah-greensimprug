<?php
session_start();
include "../connection/connection.php";
//mengambil data inputan dari index_admin.php
$id=$_POST['id'];
$password = md5($_POST['password']);

//cek petugas
$ada = $db->prepare('SELECT id_petugas, password FROM tb_petugas');
$ada->execute();
foreach ($ada as $row) {
	if  ($id==$row['id_petugas'] and $password==$row['password'])
	{
	//kalau username dan password sudah terdaftar di database, buat session dengan nama id dengan isi nama id yang login
	                $_SESSION['admin']=$id;
	                header('location: ../pages/index.php');
	}
	else
	{

	//kalau username ataupun password tidak terdaftar di database
	                echo'
	                <script type="text/javascript">
		                alert("ID Anda tidak terdaftar!");
		                window.location="../index.php";
		                window.reload();
	                </script>
	                ';
	}
}

?>