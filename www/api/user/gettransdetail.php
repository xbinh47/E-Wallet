<?php 
    require_once('services.php');
    
    if ($_SERVER['REQUEST_METHOD'] != 'POST'){
        die(json_encode(array('code' => 4, 'data' => 'Only POST method is supported')));
    }
    
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    if ($contentType !== "application/json") {
        die(json_encode(array('code' => 4, 'data' => 'Content-Type is not set as "application/json"')));
    }
    $content = file_get_contents('php://input');
    
    $data=json_decode($content);
    
    if(is_null($data)){
        die(json_encode(array('code' => 2, 'data' => 'Only json is supported')));
    }
    
    if (!property_exists($data,'idtrans') || !property_exists($data,'transtype')){
        die(json_encode(array('code' => 1, 'data' => 'Missing Paramenter')));
    }

    $idtrans = $data->idtrans;
    $transtype = $data->transtype;
    getTransaction($idtrans,$transtype);
?>