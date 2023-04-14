<?php
function nambah_mahasiswa($conn, $nrp, $nama){

    $tambah = "INSERT INTO mahasiswa (nrp, nama_mahasiswa)
                VALUES ($nrp, '$nama')";
    mysqli_query($conn, $tambah);

}
?>