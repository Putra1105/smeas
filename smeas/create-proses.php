<?php
//mulai proses tambah data


//cek dahulu, jika tombol tambah di klik
if(isset($_POST['tambah'])){

	//inlcude atau memasukkan file koneksi ke database
	include('koneksi.php');

	//jika tombol tambah benar di klik maka lanjut prosesnya
	$name		= $_POST['nama'];	//membuat variabel $nama dan datanya dari inputan Nama Lengkap
	$class		= $_POST['kelas'];	//membuat variabel $kelas dan datanya dari inputan dropdown Kelas
	$major	    = $_POST['jurusan'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan

	$gambar		= $_FILES['gambar']['name'];

	$role       = $_POST['role'];	//membuat variabel $role dan datanya dari inputan dropdown role

	$dir 		= "image/";
	$tmpFile	= $_FILES['gambar']['tmp_name'];

	move_uploaded_file($tmpFile, $dir.$gambar);

	//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
	$sql = "INSERT INTO sys_users (name, class, major, role_id, image) VALUES('$name', '$class', '$major', '$role', '$gambar')";

	//jika query input sukses
	if (mysqli_query($koneksi, $sql)) {
		echo 'Data berhasil di tambahkan! ';		//Pesan jika proses tambah sukses
		echo '<a href="home.php">Kembali</a>';	//membuat Link untuk kembali ke halaman tambah
	} else {
		echo 'Gagal menambahkan data! ';		//Pesan jika proses tambah gagal
		echo '<a href="home.php">Kembali</a>';	//membuat Link untuk kembali ke halaman tambah
		echo "Error: ".$sql.". ".mysqli_error($koneksi);
	}

}else{	//jika tidak terdeteksi tombol tambah di klik

	//redirect atau dikembalikan ke halaman tambah
	echo '<script>window.history.back()</script>';

}
?>