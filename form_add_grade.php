<?php
    include("connect.php");

    $query = "SELECT * FROM matkul";
    $query_nama = "SELECT * FROM mahasiswa";

    $result = $conn -> query($query);
    $result_nama = $conn -> query($query_nama);

    $matkul = array();
    $id_matkul = array();
    while($row = $result -> fetch_assoc()){
        $matkul[] = $row['nama_matkul'];
        $id_matkul[] = $row['id'];
    }
    $nrp = array();
    $nama = array();
    while($row = $result_nama -> fetch_assoc()){
        $nama[] = $row['nama_mahasiswa'];
        $nrp[] = $row['NRP'];
    }

?>
<html>
    <head>
        <h3>Form Add Grade</h3>
    </head>
    <body>
        <form action="add_grade_process.php" method="get">
            <table class ='table table-hover col-3 shadow p-3 mb-5 bg-white rounded'>
                <tr>
                    <td>Nama</td>
                    <td>
                        <select name="nrp" class = "col-12">
                            <?php
                                $i = 0;
                                foreach($nama as $m){
                                    echo "<option value='$nrp[$i]'>$nrp[$i] - $m</option>";
                                    $i++;
                                }
                            ?>
                        </select>
                </tr>
                <tr>
                    <td>Mata Kuliah</td>
                    <td>
                        <select name="matkul" class = "col-12">
                            <?php
                                $i = 0;
                                foreach($matkul as $m){
                                    echo "<option value='$id_matkul[$i]'>$id_matkul[$i] - $m</option>";
                                    $i++;
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nilai</td>
                    <td><input type="text" name="nilai" class = "col-12"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" class="btn btn-secondary btn-sm" value="Submit"></td>
                </tr>
            </table>
        </form>
    </body>
</html>