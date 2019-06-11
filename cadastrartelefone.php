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

$telefone=$_POST['telefone'];
$celular=$_POST['celular'];


$sql="insert into telefone (Telefone, celular, Matricula_Aluno) 
values ('$telefone', '$celular', '$matricula_aluno')";
if (!mysqli_query($conn,$sql))
{
die ("erro: ".mysqli_error($conn));
}
else

echo "<script type=\"text/javascript\">".
"alert('Aluno Registrado!');".
"</script>";

// fecha conexao
mysqli_close($conn);

echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=exibiralunos.php'>";
?>