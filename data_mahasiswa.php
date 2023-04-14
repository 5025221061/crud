<?php
function tampil_mahasiswa($user, $conn){
    $count = 0;


    $select =   "SELECT nama_mahasiswa, nama_matkul, nilai, sks, huruf FROM mahasiswa 
                    LEFT JOIN nilai ON nilai.NRP = mahasiswa.NRP 
                    LEFT JOIN matkul ON matkul.id = kode_matkul WHERE mahasiswa.NRP = $user";
    $result = mysqli_query($conn, $select);

    include("tampil_nilai.php");   
    
    

}    
?> 