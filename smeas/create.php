<?php //include('cek-login.php'); ?>
<?php include('header.php'); ?>

<head>
    <link rel="stylesheet" href="./assets/css/style.bundle.css">
</head>

<body style="overflow:hidden">
    <div class="container">
        <div>
            <h3>Tambah Data Siswa</h3>
        </div>
        <div class="row">
            <form action="create-proses.php" method="post" enctype="multipart/form-data">
                <div class="col-md-12" style="display: flex;">
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input class="form-control" type="text" name="nama" size="30" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kelas</label>
                        <select class="form-select form-select-sm" name="kelas" required>
                            <option value="">Pilih Kelas</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12" style="display: flex;">
                    <div class="col-md-6">
                        <label class="form-label">Jurusan</label>
                        <select class="form-select form-select-sm" name="jurusan" required>
                            <option value="">Pilih Jurusan</option>
                            <option value="RPL">RPL</option>
                            <option value="Multimedia">Multimedia</option>
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Perbankan">Perbankan</option>
                            <option value="Pemasaran">Pemasaran</option>
                            <option value="Perhotelan">Perhotelan</option>
                            <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Role</label>
                        <select class="form-select form-select-sm" name="role" required>
                            <option value="">Pilih Role</option>
                            <option value="1">Admin</option>
                            <option value="2">Teacher</option>
                            <option value="3">Student</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="col-md-12">
                        <label class="form-label">Gambar</label>
                        <input type="file" name="gambar" id="gambar" accept="image/*" onchange="previewImage()">
                        <br>
                        <img src="" alt="Empty Image" width="150" id="preview" class="my-3">

                    </div>
                </div>
                <div class="col-md-12">
                    <input type="submit" name="tambah" value="Tambah"></td>
                </div>
            </form>
        </div>
    </div>
</body>

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