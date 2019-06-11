<?php

echo "<style> body{
    background-color:#F0F8FF; 
}
</style>";

include "conexao.php";

$matricula=$_POST['matricula'];
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

$sql = "update aluno set nome='$nome', email='$email', sexo='$sexo', data_nasc='$data_nasc', cpf='$cpf', rg='$rg', uf_identidade='$uf_identidade', estado_civil='$estado_civil', objetivo='$objetivo', profissao='$profissao' where matricula=$matricula";
$result = mysqli_query($conn, $sql ) or die(mysql_error());
$sucesso=mysqli_affected_rows($conn);

if ($sucesso==0)
{ echo "Nao encontrado"; }
else
{ 
    echo "<script type=\"text/javascript\">".
    "alert('Atualizado com sucesso!');".
    "</script>"; 
}

mysqli_close($conn);

echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=exibiralunos.php'>";
?>