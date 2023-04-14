<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-type: application/json');
    $res = array();
    $res['status'] = 'success';
    $res['data'] = array();
    $res['data']['students'] = array();
    $res['data']['students'][] = array('name' => 'John', 'age' => 20);
    $res['data']['students'][] = array('name' => 'Mary', 'age' => 21);
    $res['data']['students'][] = array('name' => 'Peter', 'age' => 22);
    $res['data']['students'][] = array('name' => 'Jane', 'age' => 23);
    $res['data']['students'][] = array('name' => 'Tom', 'age' => 24);
    echo json_encode($res);
?>