<?php
    include("connect.php");
    $NRP = $_GET['nrp'];
    $id = $_GET['matkul'];
    $nilai = $_GET['nilai'];
    $cek = "SELECT * FROM nilai WHERE NRP = '$NRP' AND kode_matkul = '$id'";
    $sql = $conn -> query($cek);
    if($sql -> num_rows == 0)
        $query = "INSERT INTO nilai (NRP, kode_matkul, nilai) VALUES ('$NRP', '$id', '$nilai')";
    else{
        $query = "UPDATE nilai set nilai = '$nilai' where NRP = '$NRP' AND kode_matkul = '$id'";
    }
    try{
        $result = $conn -> query($query);
        header("Location: index.php");
    }catch (Exception $e){
        // header("Location: error.php");
    }

