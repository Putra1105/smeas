<?php
//mulai proses edit data

//cek dahulu, jika tombol simpan di klik
if(isset($_POST['simpan'])){

	//inlcude atau memasukkan file koneksi ke database
	include('koneksi.php');

	//jika tombol tambah benar di klik maka lanjut prosesnya
	$id			= $_POST['id'];	//membuat variabel $id dan datanya dari inputan hidden id
	$nama		= $_POST['nama'];	//membuat variabel $nama dan datanya dari inputan Nama Lengkap
	$kelas		= $_POST['kelas'];	//membuat variabel $kelas dan datanya dari inputan dropdown Kelas
	$jurusan	= $_POST['jurusan'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	
	$gambar		= $_FILES['gambar']['name'];
	$tmpFile	= $_FILES['gambar']['tmp_name'];
	$dir = 'image/';
	

	move_uploaded_file($tmpFile, $dir.$gambar);
	
	
	$queryShow = "SELECT * FROM sys_users WHERE id_user='$id'";
	$sqlShow = mysqli_query($koneksi ,$queryShow);
	$result = mysqli_fetch_assoc($sqlShow);

	unlink('image/'.$result['image']);


	if($_FILES['gambar']['name'] == ""){
		echo "kosong";
	}else{
		echo "ada isi";
	}

	//melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE siswa_id='$id' <- diambil dari inputan hidden id
	//$update = mysql_query("UPDATE siswa SET siswa_nis='$nis', siswa_nama='$nama', siswa_kelas='$kelas', siswa_jurusan='$jurusan' WHERE siswa_id='$id'") or die(mysql_error());
    $sql = "UPDATE sys_users SET name='$nama', class='$kelas', major='$jurusan', image='$gambar' WHERE id_user='$id'";


	//jika query update sukses
	if(mysqli_query($koneksi, $sql)){

		echo 'Data berhasil di simpan! ';		//Pesan jika proses simpan sukses
		echo '<a href="home.php">Kembali</a>';	//membuat Link untuk kembali ke halaman

	}else{

		echo 'Gagal menyimpan data! ';		//Pesan jika proses simpan gagal
		echo '<a href="home.php">Kembali</a>';	//membuat Link untuk kembali ke halaman

	}

}else{	//jika tidak terdeteksi tombol simpan di klik

	//redirect atau dikembalikan ke halaman edit
	echo '<script>window.history.back()</script>';

}
?>