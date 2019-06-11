<?php

include "conexao.php";
// executa consulta

echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>";
echo "<link rel='stylesheet' type='text/css' href='style/style.css'>";

$codigo_horario=$_POST['codigo_horario'];
$sql = "SELECT * from horario inner join turma on turma.codigo_horario=horario.codigo_horario where turma.codigo_horario='$codigo_horario'";
// mostra resultado
$result = mysqli_query($conn, $sql );
$linha = mysqli_fetch_assoc($result) ;

?>
    <meta charset="utf-8"/>

    <div id='header'>

        <h1>Sistema<span class='academia_titulo'>SCA<br>Editar Horário</span></h1>    
        
    </div>
                
    <div id='conteudo'>

    <table align="center">
    
    <form method=post action=grava_altera_horario.php>



        <tr>
            <td><input type=hidden name=codigo_horario value="<?php echo$linha['Codigo_Horario']; ?>">
            Código da Turma: </td><td><?php echo $linha['Codigo_Turma']; ?></td>
        </tr>

        <tr>
            <td>Dia da Semana: </td><td><select name=dia_semana required>
            <option value="<?php echo $linha['Dia_Semana']; ?>"><?php echo $linha['Dia_Semana']; ?></option>
            <option value="Domingo">Domingo</option>
            <option value="Segunda-Feira">Segunda-Feira</option>
            <option value="Terca-Feira">Terça-Feira</option>
            <option value="Quarta-Feira">Quarta-Feira</option>
            <option value="Quinta-Feira">Quinta-Feira</option>
            <option value="Sexta-Feira">Sexta-Feira</option>
            <option value="Sabado">Sábado</option>
            </select></td>
        </tr>

        <tr>
            <td>Hora de Inicio: </td><td><input type=time name=hora_inicio value="<?php echo $linha['Hora_Inicio']; ?>" required></td>
        </tr>

        <tr>
            <td>Hora de Fim: </td><td><input type=time name=hora_fim value="<?php echo $linha['Hora_Fim']; ?>" required></td>
        </tr>

        <tr align="center"><td colspan="2"><input type=submit value="Enviar"></td></tr>

    </form>

    </table>

    </div>

    <div id="bottom">

    <form method=post action=exibirturmas.php>
        <input type=submit value="Cancelar">
    </form>

    </div>
<?php 
// fecha conexao
mysqli_close($conn);

?>