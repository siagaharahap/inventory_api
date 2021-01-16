<?php
require("../koneksi.php");

$response = array();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id_bkeluar     = $_POST["id_bkeluar"];

        $query    = "DELETE FROM barang_keluar WHERE id_bkeluar = '$id_bkeluar'";
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