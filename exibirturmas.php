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
$sql= "SELECT turma.codigo_turma, turma.sexo, funcionario.nome, funcionario.codigo_funcionario, horario.codigo_horario, horario.dia_semana, horario.hora_inicio, horario.hora_fim 
from turma 
inner join horario on turma.codigo_horario=horario.codigo_horario 
inner join funcionario on turma.codigo_funcionario=funcionario.codigo_funcionario
order by turma.codigo_turma asc";
// mostra resultado

$result = mysqli_query($conn, $sql );
$consulta_resultado=mysqli_num_rows($result);

echo "<div id='header'>
<h1>Sistema<span class='academia_titulo'>SCA<br>Turmas</span></h1>    
</div>";
echo "<div id='conteudo'>";
echo "<div id='place1'>";
echo "<table>";
echo "<tr>";
echo "<td width='100'> Codigo da Turma";
echo "<td> Sexo da Turma";
echo "<td> Nome do Professor";
echo "<td> Dia da Semana";
echo "<td> Hora Inicio";
echo "<td> Hora Fim";
echo "<td> Quantidade de Alunos";
echo "<td colspan=5 align=center> Acao";
while ( $linha = mysqli_fetch_assoc($result) ) 
{
$codigo_turma=$linha['codigo_turma'];
$codigo_horario=$linha['codigo_horario'];

$qtd_aluno = "SELECT count(matricula_aluno) from alunos_turma where codigo_turma='$codigo_turma'";
$qtd_aluno2 = mysqli_query($conn, $qtd_aluno);
$qtd_aluno3=mysqli_fetch_array($qtd_aluno2);
$qtd_aluno4=$qtd_aluno3[0];

echo "<tr>";
echo "<td>".$linha['codigo_turma'];
echo "<td>".$linha['sexo'];
echo "<td>".$linha['nome'];
echo "<td>".$linha['dia_semana'];
echo "<td>".$linha['hora_inicio'];
echo "<td>".$linha['hora_fim'];
echo "<td>".$qtd_aluno4;
echo "<td><form method=post action=adicionar_aluno_turma.php>";
echo "<input type=hidden name=codigo_turma value=$codigo_turma>";
echo "<input type=submit value='Adicionar Aluno'>";
echo "</form>";
echo "<form method=post action=remover_aluno_turma.php>";
echo "<input type=hidden name=codigo_turma value=$codigo_turma>";
echo "<input type=submit value='Remover Aluno'>";
echo "</form>";
echo "<td><form method=post action=alterar_horario.php>";
echo "<input type=hidden name=codigo_horario value=$codigo_horario>";
echo "<input type=submit value='Editar Horario'>";
echo "</form>";
echo "<td><form method=post action=alterar_turma.php>";
echo "<input type=hidden name=codigo_turma value=$codigo_turma>";
echo "<input type=submit value='Editar Turma'>";
echo "</form>";
echo "<form method=post action=excluir_turma.php>";
echo "<input type=hidden name=codigo_turma value=$codigo_turma>";
echo "<input type=hidden name=codigo_horario value=$codigo_horario>";
echo "<input type=submit value='Excluir Turma'>";
echo "</form>";
echo "</tr>";
}
echo "</table><br>";
echo "</div>";
echo "<div id='place2'>";
echo "<table>";
echo "<tr>";
echo "<td><form method=post action=alterar_turma.php>";
echo "Pesquisar por Codigo: <input type=text name=codigo_turma>";
echo "<input type=submit value='Editar'>";
echo "</form>";
echo "</table>";
echo "</div>";

echo "<div id='bottom'>";
echo "<button class='link'><a href='Cadastro Turma.php'>Cadastro de Turma</a></button>";
echo "<button class='link'><a href='index.html'>Voltar</a></button><br><br><br>";
echo "</div>";

echo "</div>";
// fecha conexao
mysqli_close($conn);

?>