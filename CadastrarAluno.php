<?php

echo "<style> body{
    background-color:#F0F8FF; 
}
</style>";

include "conexao.php";

$nome=$_POST['nome'];
$email=$_POST['email'];
$sexo=$_POST['sexo'];
$data_nasc=$_POST['data_nasc'];
$cpf=$_POST['cpf'];
$rg=$_POST['rg'];
$uf_identidade=$_POST['uf_identidade'];
$estado_civil=$_POST['estado_civil'];
$objetivo=$_POST['objetivo'];
$profissao=$_POST['profissao'];


$sql="insert into aluno (nome, email, sexo, data_nasc, cpf, rg, uf_identidade, estado_civil, objetivo, profissao) 
values ('$nome','$email','$sexo','$data_nasc','$cpf','$rg','$uf_identidade','$estado_civil','$objetivo','$profissao')";
if (!mysqli_query($conn,$sql))
{
die ("erro: ".mysqli_error($conn));
}
else

mysqli_close($conn);

echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=Cadastrar Endereco.html'>";
?>