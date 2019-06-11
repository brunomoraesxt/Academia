<?php

echo "<style> body{
    background-color:#F0F8FF; 
}
</style>";

include "conexao.php";

$select_horario = "SELECT codigo_horario from horario order by codigo_horario desc limit 1";
$horario = mysqli_query($conn,$select_horario);
$horario_s = mysqli_fetch_row($horario);
$codigo_horario=$horario_s[0];

$select_turma = "SELECT codigo_turma from turma order by codigo_turma desc limit 1";
$turma = mysqli_query($conn,$select_turma);
$turma_s = mysqli_fetch_row($turma);
$codigo_turma=$turma_s[0];

$sql="update turma set codigo_horario='$codigo_horario' where codigo_turma='$codigo_turma'";

if (!mysqli_query($conn,$sql))
{
die ("erro: ".mysqli_error($conn));
}
else
{ echo "<script type=\"text/javascript\">".
    "alert('Turma registrada com sucesso!');".
    "</script>"; }


mysqli_close($conn);

echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=exibirturmas.php'>";
?>