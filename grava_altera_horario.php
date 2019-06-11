<?php

echo "<style> body{
    background-color:#F0F8FF; 
}
</style>";

include "conexao.php";

$codigo_horario=$_POST['codigo_horario'];
$dia_semana=$_POST['dia_semana'];
$hora_inicio=$_POST['hora_inicio'];
$hora_fim=$_POST['hora_fim'];

$sql = "update horario set Dia_Semana='$dia_semana', Hora_Inicio='$hora_inicio', Hora_Fim='$hora_fim'
 where Codigo_Horario='$codigo_horario' ";
$result = mysqli_query($conn, $sql ) or die(mysql_error());
$sucesso=mysqli_affected_rows($conn);

if ($sucesso==0)
{ 
    echo "<script type=\"text/javascript\">".
    "alert('Dado não atualizado, tentar novamente.');".
    "</script>";
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='5; URL=exibirturmas.php'>";
}
else
{ echo "<script type=\"text/javascript\">".
    "alert('Atualizado com sucesso!');".
    "</script>"; }
mysqli_close($conn);

echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=exibirturmas.php'>";

?>