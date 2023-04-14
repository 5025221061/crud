<?php
    include("../connect.php");
    $NRP = $_GET['nrp'];
    $query = "SELECT * FROM mahasiswa WHERE NRP = '$NRP'";
    $result = $conn -> query($query);
    while($row = $result -> fetch_assoc()){
        $nama_mahasiswa = $row['nama_mahasiswa'];
    }

    $res = new stdClass();
    $res->nrp = $NRP;
    $res->nama_mahasiswa = $nama_mahasiswa;
    echo json_encode($res);
?>