<?php

echo "<style> body{
    background-color:#F0F8FF; 
}
</style>";

include "conexao.php";

$telefone=$_POST['telefone'];
$celular=$_POST['celular'];
$matricula_aluno=$_POST['matricula_aluno'];

$sql = "update telefone set Telefone='$telefone', celular='$celular' where Matricula_Aluno='$matricula_aluno'";
$result = mysqli_query($conn, $sql ) or die(mysql_error());
$sucesso=mysqli_affected_rows($conn);

if ($sucesso==0)
{ echo "<script type=\"text/javascript\">".
    "alert('Nao encontrado.');".
    "</script>"; }
else
{ echo "<script type=\"text/javascript\">".
    "alert('Atualizado com sucesso!');".
    "</script>"; }

mysqli_close($conn);

echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=exibiralunos.php'>";
?>