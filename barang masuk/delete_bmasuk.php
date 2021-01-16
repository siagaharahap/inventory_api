<?php
require("../koneksi.php");

$response = array();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id_bmasuk     = $_POST["id_bmasuk"];

        $query    = "DELETE FROM barang_masuk WHERE id_bmasuk = '$id_bmasuk'";
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