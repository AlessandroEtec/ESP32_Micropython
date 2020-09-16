<?php
date_default_timezone_set("America/Sao_Paulo");
$data = date("Y-m-d");
    //echo "Data: $data";
    if(!empty($_GET["data"])){
        $data = $_GET["data"];

}
header('Content-Type: application/json');
include("../conexao.php");
$sql = "select id, date_format(data,'%H:%i') as data, temperatura, umidade from dht where date_format(data,'%d-%m-%Y') = '$data'";
$result = mysqli_query($conexao, $sql);
$r["result"] = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($r, JSON_UNESCAPED_UNICODE);