<?php

echo "<style> body{
    background-color:#F0F8FF; 
}
</style>";

include "conexao.php";

$dia_semana=$_POST['dia_semana'];
$hora_inicio=$_POST['hora_inicio'];
$hora_fim=$_POST['hora_fim'];

$sql="insert into horario (dia_semana, hora_inicio, hora_fim) values ('$dia_semana','$hora_inicio','$hora_fim')";

if (!mysqli_query($conn,$sql))
{
die ("erro: ".mysqli_error($conn));
}
else

mysqli_close($conn);

echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=Cadastrarhorarioturma.php'>";
?>