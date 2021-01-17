<?php
require("../koneksi.php");

$query = "SELECT * FROM barang_masuk a, data_barang b where a.id_barang=b.id_barang";
$eksekusi = mysqli_query($konek, $query);
$cek = mysqli_affected_rows($konek);

    if($cek > 0){
        $response["kode"] = 1;
        $response["pesan"] = "Data Tersedia";
        $response["data"] =  array();

        while($ambil = mysqli_fetch_object($eksekusi)){
            $d["id_bmasuk"] = $ambil->id_bmasuk;
            $d["nama_barang"] = $ambil->nama_barang;
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