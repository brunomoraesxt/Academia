<?php

echo "<style> body{
    background-color:#F0F8FF; 
}
</style>";

include "conexao.php";
// executa consulta

$select_matricula = "SELECT matricula from aluno order by matricula desc limit 1";
$matricula = mysqli_query($conn,$select_matricula);
$matricula_s = mysqli_fetch_row($matricula);
$matricula_aluno=$matricula_s[0];

$endereco=$_POST['endereco'];
$bairro=$_POST['bairro'];
$cep=$_POST['cep'];
$cidade=$_POST['cidade'];
$uf=$_POST['uf'];

$sql="insert into endereco (endereco, bairro, cep, cidade, uf, matricula_aluno) 
values ('$endereco','$bairro','$cep','$cidade','$uf','$matricula_aluno')";
if (!mysqli_query($conn,$sql))
{
die ("erro: ".mysqli_error($conn));
}
else

// fecha conexao
mysqli_close($conn);

echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=Cadastrar Telefone.html'>";
?>