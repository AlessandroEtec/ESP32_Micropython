
<?php

include("../conexao.php");
header('Content-Type: application/json');
$temp = $_REQUEST['temp'];
$umid = $_REQUEST['umid'];

$sql = "insert into dht (data, temperatura, umidade) values (now(),$temp, $umid)";
$status = mysqli_query($conexao, $sql);
if ($status) {
    $data = ["status" => "OK", "msg" => "Inserido com Sucesso"];
    echo json_encode($data);
} else {
    $data = ["status" => "Erro", "msg" => "Erro ao Inserir " . mysqli_error($conexao)];
    echo json_encode($data);
}
?>


