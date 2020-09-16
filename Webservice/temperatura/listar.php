<?php

header('Content-Type: application/json');
include("../conexao.php");
$sql = "select id, date_format(data,'%d/%m/%Y') as data, max(temperatura) as max_temp, min(temperatura) as min_temp, max(umidade) as max_umid, min(umidade) as min_umid from dht group by date(data) order by data desc";
$result = mysqli_query($conexao, $sql);
$r["result"] = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($r, JSON_UNESCAPED_UNICODE);
?>
 