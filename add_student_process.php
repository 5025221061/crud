<?php
    include("connect.php");
    $NRP = $_GET['nrp'];
    $nama_mahasiswa = $_GET['nama_mahasiswa'];
    $query = "INSERT INTO mahasiswa (NRP, nama_mahasiswa) VALUES ('$NRP', '$nama_mahasiswa')";
    //cek berhasil atau tidak
    try{
        $result = $conn -> query($query);
        header("Location: index.php");
    }catch(Exception $e){
        header("Location: connect.php");
    }
?>