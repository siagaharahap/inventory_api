<?php
require("../koneksi.php");

$response = array();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id_barang     = $_POST["id_barang"];
        $jumlah        = $_POST["jumlah"];
        $tgl_masuk     = $_POST["tgl_masuk"];

        $query    = "INSERT INTO barang_masuk (id_barang, jumlah, tgl_masuk) VALUES ('$id_barang', '$jumlah', $tgl_masuk)";
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