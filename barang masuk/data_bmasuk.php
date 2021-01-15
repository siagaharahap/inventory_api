<?php
require("../koneksi.php");

$query = "SELECT * FROM barang_masuk";
$eksekusi = mysqli_query($konek, $query);
$cek = mysqli_affected_rows($konek);

    if($cek > 0){
        $response["kode"] = 1;
        $response["pesan"] = "Data Tersedia";
        $response["data"] =  array();

        while($ambil = mysqli_fetch_object($eksekusi)){
            $d["id_bmasuk"] = $ambil->id_bmasuk;
            $d["id_barang"] = $ambil->id_barang;
            $d["jumlah"] = $ambil->jumlah;
            $d["tgl_masuk"] = $ambil->tgl_masuk;

            array_push($response["data"], $d);
        }

    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Data Tidak Tersedia";
    }

    echo json_encode($response);
    mysqli_close($konek);