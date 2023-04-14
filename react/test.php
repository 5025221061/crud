  <?php
  header('Access-Control-Allow-Origin: *');
  header('Content-type: application/json');
  //ambi data dari payload json
  include("../connect.php");
  $data = json_decode(file_get_contents('php://input'), true);
  $nama = $data['nama'];
  $nrp = $data['nrp'];
  $query = "INSERT INTO mahasiswa VALUES ('$nrp', '$nama')";
  try{
    $result = $conn -> query($query);
    $res = new stdClass();
    $res -> status = "berhasil";
    echo json_encode($res);
  }catch(Exception $e){
    $res = new stdClass();
    $res -> status = "gagal";
    echo json_encode($res);
  }


  ?>