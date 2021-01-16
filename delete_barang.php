<?php
require("koneksi.php");

$response = array();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id_barang     = $_POST["id_barang"];

        $query    = "DELETE FROM data_barang WHERE id_barang = '$id_barang'";
        $eksekusi = mysqli_query($konek, $query);
        $cek      = mysqli_affected_rows($konek);

        if($cek > 0){
            $response["kode"]  = 1;
            $response["pesan"] = "Hapus Data Berhasil";
        }
        else{
            $response["kode"]  = 0;
            $response["pesan"] = "Hapus Data Gagal";
        }
    }
    else{
        $response["kode"]  = 0;
            $response["pesan"] = "Tidak Ada Post Data";
    }

echo json_encode($response);
mysqli_close($konek);