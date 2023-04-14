<?php
    include("connect.php");
    $sql = "SELECT * FROM mahasiswa ORDER BY nama_mahasiswa";
    $result = $conn -> query($sql);
    $i = 0;
    $NRP = array();
    $nama_mahasiswa = array();
    while($row = $result -> fetch_assoc()){
        $NRP[$i] = $row['NRP'];
        $nama_mahasiswa[$i] = $row['nama_mahasiswa'];
        $i++;
    }

?>

<!DOCTYPE html>
<html>
<body>
    <h3> Choose Student </h3>
	<form class = "col-2 shadow p-0 mb-5">
		<select name="nama_mahasiswa" onChange="tampil(this.value)" class="form-control form-control">
            <option value="">Choose student</option>
            <?php
                $i = 0;
                foreach($nama_mahasiswa as $m){
                    echo "<option value='$NRP[$i]'>$m</option>";
                    $i++;
                }
            ?>
            </select>
	</form>

	<div id="list_student"></div>
	<script type="text/javascript">
		function tampil(nama_mahasiswa)
		{
			var xhttp;
            if(nama_mahasiswa == "")
            {
                document.getElementById('list_student').innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onload = function(){
                document.getElementById('list_student').innerHTML = this.responseText;
            };
            xhttp.open("GET", "tampil_nilai.php?nrp="+nama_mahasiswa, true);
            xhttp.send();
            //

		}
	</script>
</body>
</html>