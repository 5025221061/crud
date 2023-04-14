<?php
$conn = new mysqli("localhost", "root", "", "pertama");
if ($conn->connect_errno) {
    echo "Gagal terkoneksi ke MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
}


?>