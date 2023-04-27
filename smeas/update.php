<?php //include('cek-login.php'); ?>
<?php include('header.php'); ?>

<h3>Edit Data Siswa</h3>

<?php
//proses mengambil data ke database untuk ditampilkan di form edit berdasarkan siswa_id yg didapatkan dari GET id -> edit.php?id=siswa_id

//include atau memasukkan file koneksi ke database
include('koneksi.php');

//membuat variabel $id yg nilainya adalah dari URL GET id -> edit.php?id=siswa_id
$id = $_GET['id'];

//melakukan query ke database dg SELECT table siswa dengan kondisi WHERE siswa_id = '$id'
$sql = "SELECT * FROM sys_users WHERE id_user='$id'";
$result = mysqli_query($koneksi, $sql);

//cek apakah data dari hasil query ada atau tidak
if(mysqli_num_rows($result) == 0){

	//jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> index.php
	echo '<script>window.history.back()</script>';

}else{

	//jika data ditemukan, maka membuat variabel $data
	$data = mysqli_fetch_assoc($result);	//mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah

}
?>





<form action="update-proses.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <!-- membuat inputan hidden dan nilainya adalah siswa_id -->
    <ul style="list-style-type: none;">

        <li class='my-2 mx-3'>
            <label for="nama"> Nama Lengkap :</label>
            <input type="text" name="nama" size="30" value="<?php echo $data['name']; ?>" required>
            <!-- value diambil dari hasil query -->
        </li>
        <li class='my-2 mx-3'>
            <label for="kelas"> Nama Lengkap :</label>
            <select name="kelas" required>
                <option value="">Pilih Kelas</option>
                <option value="X" <?php if($data['class'] == 'X'){ echo 'selected'; } ?>>X</option>
                <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
                <option value="XI" <?php if($data['class'] == 'XI'){ echo 'selected'; } ?>>XI</option>
                <!-- jika data didatabase sama dengan value maka akan terselect/terpilih -->
                <option value="XII" <?php if($data['class'] == 'XII'){ echo 'selected'; } ?>>XII</option>
                <!-- jika data di dat abase sama dengan value maka akan terselect/terpilih -->
            </select>
        </li>
        <li class='my-2 mx-3'>
            <label for="jurusan"> Jurusan :</label>
            <select name="jurusan" required>
                <option value="">Pilih Jurusan</option>
                <option value="RPL" <?php if($data['major'] == 'RPL'){ echo 'selected'; } ?>>RPL</option>
                <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
                <option value="Multimedia" <?php if($data['major'] == 'Multimedia'){ echo 'selected'; } ?>>
                    Multimedia</option>
                <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
                <option value="Akuntansi" <?php if($data['major'] == 'Akuntansi'){ echo 'selected'; } ?>>Akuntansi
                </option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
                <option value="Perbankan" <?php if($data['major'] == 'Perbankan'){ echo 'selected'; } ?>>Perbankan
                </option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
                <option value="Pemasaran" <?php if($data['major'] == 'Pemasaran'){ echo 'selected'; } ?>>Pemasaran
                </option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
                <option value="Perhotelan" <?php if($data['major'] == 'Perhotelan'){ echo 'selected'; } ?>>
                    Perhotelan</option>
                <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
                <option value="Desain Komunikasi Visual"
                    <?php if($data['major'] == 'Desain Komunikasi Visual'){ echo 'selected'; } ?>>Desain Komunikasi
                    Visual</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
            </select>
        </li>

        <li class="my-2 mx-3">
            <label for="gambar">Gambar :</label>
            <input type="file" name="gambar" id="gambar" accept="image/*" onchange="previewImage()">
            <br>
            <img src="image\<?= $data['image'] ?>" width="200" id="preview" class="mt-3">

        </li>


        <li class='my-2 mx-3'>

            <input type="submit" name="simpan" value="Simpan">
        </li>
    </ul>

</form>

<script>
function previewImage() {
    var file = document.getElementById('gambar').files[0];
    var reader = new FileReader();


    reader.onload = function(e) {
        var previewImage = document.getElementById('preview');
        previewImage.src = e.target.result;
    }

    reader.readAsDataURL(file);

}
</script>
<?php include('footer.php'); ?>