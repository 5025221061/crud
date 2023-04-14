<?php
include("connect.php");

class Nilai{
    public $id;
    public $nama;
    public $matkul = array();
    public $nilai = array();
    public $sks = array();

    function __constructor($id){
        $this->id = $id;
        $this->matkul[] = "";
        $this->nilai[] = "";
        $this->sks[] = "";
        $this->nama;
    }

    function addNilai($obj){
        array_push($this->nilai, $obj);
    }

    function addMatkul($obj){
        array_push($this->matkul, $obj);
    }

    function addSks($obj){
        array_push($this->sks, $obj);
    }

    function setNama($nama){
        $this->nama = $nama;
    }

    function getNama(){
        return $this->nama;
    }

    function getMatkul($id_matkul){
        return $this->matkul[$id_matkul];
    }

    function getNilai($id_nilai){
        return $this->nilai[$id_nilai];
    }

    function count(){
        return sizeof($this->matkul);
    }


    function getGrade($nilai){
        switch($nilai){
            case $nilai>=86:
                $grade = 4;
                break;
            case $nilai>=76:
                $grade = 3.5;
                break;
            case $nilai>=66:
                $grade = 3;
                break;
            case $nilai>=61:
                $grade = 2.5;
                break;
            case $nilai>=56:
                $grade = 2;
                break;
            case $nilai>=41:
                $grade = 1.5;
                break;
            case $nilai>=0:
                $grade = 1;
                break;
            default :
                $grade = 0;
                break;
        }
        return $grade;
    }

    function getIPK(){
        $total = 0;
        $total_sks = 0;
        for($i=0; $i<$this->count(); $i++){
            $grade = $this->getGrade($this->nilai[$i]);
            $total += $grade * $this->sks[$i];
            $total_sks += $this->sks[$i];
        }
        if($total_sks == 0) return 0;
        return $total/$total_sks;
    }

    
}

function getNilaiAll($id, $conn){
    $select =   "SELECT nama_mahasiswa, nama_matkul, nilai, sks FROM mahasiswa 
        LEFT JOIN nilai ON nilai.NRP = mahasiswa.NRP 
        LEFT JOIN matkul ON matkul.id = kode_matkul WHERE mahasiswa.NRP = $id";
    $result = $conn -> query($select);

    $data = new Nilai($id);
    while($row = $result -> fetch_array(MYSQLI_ASSOC)) {
        $data->setNama($row["nama_mahasiswa"]);
        $data->addNilai($row["nilai"]);
        $data->addMatkul($row["nama_matkul"]);
        $data->addSks($row["sks"]);
    }
    return $data;
}


function tampilNilai($id, $conn){
    $data = getNilaiAll($id, $conn);

    // echo sizeof($data->nilai);
    // print_r($data);
    echo "<table class ='table table-hover col-2 shadow p-3 mb-5 bg-white rounded'>
        <thead>
            <tr>
                <th>Matkul</th>
                <th>Grade</th>
            </tr>
        </thead>";
    for($i=0; $i<$data->count(); $i++){
        echo "<tr><td>";
        echo $data->getMatkul($i);
        echo "</td><td>";
        echo $data->getNilai($i);
        echo "</td></tr>";
    }
    echo "<tr  class='table-active' ><td>GPA</td><td>";
    echo round($data->getIPK(),2);
    echo "</td></tr>";
    echo "</table>";
}

// $query = "SELECT * FROM mahasiswa";
// $result = $conn -> query($query);

// while($row = $result -> fetch_array(MYSQLI_ASSOC)) {
//     tampilNilai($row["NRP"], $conn);
//     echo "<br>";
// }
?>
