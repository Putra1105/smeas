<?php
//memulai proses hapus data

//cek dahulu, apakah benar URL sudah ada GET id -> hapus.php?id=siswa_id
if(isset($_GET['id'])){

	//inlcude atau memasukkan file koneksi ke database
	include('koneksi.php');

	//membuat variabel $id yg bernilai dari URL GET id -> hapus.php?id=siswa_id
	$id = $_GET['id'];

	$queryShow = "SELECT * FROM sys_users WHERE id_user='$id'";
	$sqlShow = mysqli_query($koneksi ,$queryShow);
	$result = mysqli_fetch_assoc($sqlShow);

//	var_dump($result);

	unlink("image/".$result['image']);

	//jika data ada di database, maka melakukan query DELETE table siswa dengan kondisi WHERE siswa_id='$id'
	// $del = mysql_query("DELETE FROM siswa WHERE siswa_id='$id'");
	$sql = "DELETE FROM sys_users WHERE id_user='$id'";

	//jika query DELETE berhasil
	if(mysqli_query($koneksi, $sql)){

		echo 'Data siswa berhasil di hapus! ';		//Pesan jika proses hapus berhasil
		echo '<a href="home.php">Kembali</a>';	//membuat Link untuk kembali ke halaman beranda

	}else{

		echo 'Gagal menghapus data! ';		//Pesan jika proses hapus gagal
		echo '<a href="home.php">Kembali</a>';	//membuat Link untuk kembali ke halaman beranda

	}


}else{

	//redirect atau dikembalikan ke halaman beranda
	echo '<script>window.history.back()</script>';

}
?>
