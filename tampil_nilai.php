<?php
include("connect.php");
include("model_nilai.php");
$nrp = $_GET['nrp'];
tampilNilai($nrp, $conn);
?>