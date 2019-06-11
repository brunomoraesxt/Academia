<?php

echo "<style> body{
    background-color:#F0F8FF; 
}
</style>";

include "conexao.php";

$endereco=$_POST['endereco'];
$bairro=$_POST['bairro'];
$cep=$_POST['cep'];
$cidade=$_POST['cidade'];
$uf=$_POST['uf'];
$matricula_aluno=$_POST['matricula_aluno'];

$sql = "update endereco set endereco='$endereco', bairro='$bairro', CEP='$cep', Cidade='$cidade', UF='$uf' where Matricula_Aluno='$matricula_aluno'";
$result = mysqli_query($conn, $sql ) or die(mysql_error());
$sucesso=mysqli_affected_rows($conn);

if ($sucesso==0)
{ echo "<script type=\"text/javascript\">".
    "alert('Nao encontrado');".
    "</script>"; }
else
{ echo "<script type=\"text/javascript\">".
    "alert('Atualizado com sucesso!');".
    "</script>"; }

mysqli_close($conn);

echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=exibiralunos.php'>";
?>