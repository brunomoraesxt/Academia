<?php

echo "<style> body{
    background-color:#F0F8FF; 
}
</style>";

include "conexao.php";
// executa consulta

$codigo_turma=$_POST['codigo_turma'];
$codigo_horario=$_POST['codigo_horario'];

$sql="delete from horario where Codigo_Horario='$codigo_horario'";

/*if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}*/

$result = mysqli_query($conn, $sql ) or die(mysql_error());
$sucesso=mysqli_affected_rows($conn);

if ($sucesso==0)
{ echo "Nao encontrado"; }
else    
    { echo "<script type=\"text/javascript\">".
        "alert('Turma removida com sucesso!');".
        "</script>"; }

// fecha conexao
mysqli_close($conn);

echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=exibirturmas.php'>";
?>