 <?php include('header.php'); ?>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="./assets/css/style.bundle.css">
</head>
<body>
    <div class="container">
        <div class="">
            <h3>Welcome <?php
                include('koneksi.php');

                $sql = "SELECT * FROM sys_users";

                $result = mysqli_query($koneksi, $sql);

                $data = mysqli_fetch_assoc($result);

                echo $data['name']
                ?></h3>
        </div>
        <div class="card rounded bg-light">
            <div class="card-body">
                <div class="row">
                    <h3>Data Siswa</h3>
                </div>
                <div class="row d-flex">
                    <div class="col-12">
                        <a class="btn btn-sm btn-primary float-end" href="create.php">Tambah Data</a>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped table-striped-columns" cellpadding="5" cellspacing="0" border="1">
                            <tr bgcolor="#CCCCCC">
                                <th>No.</th>
                                <th>Nama Lengkap</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Image</th>
                                <th>Opsi</th>
                            </tr>
                            <?php

                            //iclude file koneksi ke database
                            include('koneksi.php');

                            $sql = "SELECT * FROM sys_users WHERE role_id = 3 ORDER BY id_user DESC";

                            $result = mysqli_query($koneksi, $sql);
                            if (!$result) { //gagal request data
                                die('Error: '.mysqli_error($koneksi));
                            }else{
                                if (mysqli_num_rows($result) > 0) {
                                    //jika data tidak kosong, maka akan melakukan perulangan while
                                    $no = 1;	//membuat variabel $no untuk membuat nomor urut
                                    while($data = mysqli_fetch_assoc($result)){	//perulangan while dg membuat variabel $data yang akan mengambil data di database

                                        //menampilkan row dengan data di database
                                        echo '<tr>';
                                        echo '<td>'.$no.'</td>';	//menampilkan nomor urut
                                        echo '<td>'.$data['name'].'</td>';	//menampilkan data nama lengkap dari database
                                        echo '<td>'.$data['class'].'</td>';	//menampilkan data kelas dari database
                                        echo '<td>'.$data['major'].'</td>';	//menampilkan data jurusan dari database
                                        echo '<td><img style="width: 80px" src="./image/'.$data['image'].'"/></td>';
                                        echo '<td><a class="btn btn-sm btn-warning" href="update.php?id='.$data['id_user'].'">Edit</a><a class="btn btn-sm btn-danger ms-4" href="delete.php?id='.$data['id_user'].'" onclick="return confirm(\'Yakin?\')">Hapus</a></td>';	//menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
                                        echo '</tr>';

                                        $no++;	//menambah jumlah nomor urut setiap row
                                    }

                                } else {
                                    //jika data kosong, maka akan menampilkan row kosong
                                    echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
                                }
                            }


                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


<?php include('footer.php'); ?>
