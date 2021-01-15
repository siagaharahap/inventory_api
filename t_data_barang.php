<?php
require("koneksi.php");

$response = array();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $nama_barang     = $_POST["nama_barang"];
        $stok            = $_POST["stok"];

        $query    = "INSERT INTO data_barang (nama_barang, stok) VALUES ('$nama_barang', '$stok')";
        $eksekusi = mysqli_query($konek, $query);
        $cek      = mysqli_affected_rows($konek);

        if($cek > 0){
            $response["kode"]  = 1;
            $response["pesan"] = "Simpan Data Berhasil";
        }
        else{
            $response["kode"]  = 0;
            $response["pesan"] = "Simpan Data Gagal";
        }
    }
    else{
        $response["kode"]  = 0;
            $response["pesan"] = "Tidak Ada Post Data";
    }

echo json_encode($response);
mysqli_close($konek);