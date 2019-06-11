<?php

include "conexao.php";
// executa consulta

echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>";
echo "<link rel='stylesheet' type='text/css' href='style/style.css'>";
echo "<style>
    td{
        text-align: center;
        border-bottom: 1px solid #000;
    }
    </style>";
$codigo_turma=$_POST['codigo_turma'];

$sql = "SELECT alunos_turma.matricula_aluno, turma.codigo_turma, aluno.nome 
from alunos_turma inner join turma on alunos_turma.codigo_turma=turma.codigo_turma 
inner join aluno on alunos_turma.matricula_aluno=aluno.matricula 
where alunos_turma.codigo_turma = $codigo_turma
order by alunos_turma.matricula_aluno asc";
// mostra resultado

$result = mysqli_query($conn, $sql );
$consulta_resultado=mysqli_num_rows($result);
echo "<div id='header'>
<h1>Sistema<span class='academia_titulo'>SCA<br>Remover Aluno</span></h1>    
</div>";
echo "<div id='conteudo'>";
echo "<table align='center'>";
echo "<tr>";
echo "<td> Matricula do Aluno";
echo "<td> Nome do Aluno";
echo "<td> Acao";
while ( $linha = mysqli_fetch_assoc($result) ) 
{
$codigo_turma=$linha['codigo_turma'];
$matricula_aluno=$linha['matricula_aluno'];

echo "<tr>";
echo "<td>".$linha['matricula_aluno'];
echo "<td>".$linha['nome'];
echo "<td><form method=post action=excluir_aluno_turma.php>";
echo "<input type=hidden name=codigo_turma value=$codigo_turma>";
echo "<input type=hidden name=matricula_aluno value=$matricula_aluno>";
echo "<input type=submit value='Excluir'>";
echo "</form>";
echo "</tr>";
}
echo "</table><br>";
echo "</div>";

echo "<div id='bottom'>";
echo "<button class='link'><a href='exibirturmas.php'>Voltar</a></button></br>";
echo "</div>";

// fecha conexao
mysqli_close($conn);

?>