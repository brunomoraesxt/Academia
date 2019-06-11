<?php

include "conexao.php";

$sql="SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'academia' AND TABLE_NAME = 'aluno'";

$resultado=mysqli_query($conn,$sql);
$consulta_resultado=mysqli_fetch_array($resultado);
$matricula_aluno=$consulta_resultado[0];


?>
<!DOCTYPE html>

<html lang="pt-br">

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style/style.css">

    <meta charset="utf-8"/>
    
    <title>Cadastrar Aluno</title>

</head>

<body>

    <div id='header'>

        <h1>Sistema<span class='academia_titulo'>SCA<br>Cadastro de Alunos</span></h1>    

    </div>

    <div id='conteudo'>

    <table align="center">

        <form method=post action=CadastrarAluno.php>

            <tr>
                <td colspan=2><br>Matricula do Aluno: <?php echo $matricula_aluno; ?></td>
            </tr>

            <tr>
                <td>Nome: </td><td><input type=text name=nome required></td>
            </tr>

            <tr>
                <td>Email: </td><td><input type=email name=email required></td>
            </tr>

            <tr>
                <td>Sexo: </td><td><select name=sexo required>
                    <option value=""></option>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                </select></td>
            </tr>

            <tr>
                <td>Data Nascimento: </td><td><input type=date name=data_nasc required></td>
            </tr>

            <tr>
                <td>CPF: </td><td><input type=text name=cpf required></td>
            </tr>

            <tr>
                <td>RG: </td><td><input type=text name=rg required></td>
            </tr>

            <tr>
                <td>UF Identidade: </td><td><input type=text name=uf_identidade required></td>
            </tr>

            <tr><td colspan=2><br>Adicionais do Aluno<td></tr>

            <tr>
                <td>Estado Civil: <td><select name=estado_civil>
                    <option value=""></option>
                    <option value="Solteiro">Solteiro</option>
                    <option value="Casado">Casado</option>
                    <option value="Separado">Separado</option>
                    <option value="Divorciado">Divorciado</option>
                    <option value="Viuvo">Viúvo</option>
                    <option value="Amasiado">Amasiado</option>
                </select></td>
                </tr>

            <tr>
                <td>Objetivo: </td><td><input type=text name=objetivo></td>
            </tr>

            <tr>
                <td>Profissão: </td><td><input type=text name=profissao></td>
            </tr>

            <tr>
                <td colspan=2><br>
                    <input type=submit>
                    <input type=reset>
                </td>
            </tr>

    </table>

    </div>

    <br>

    <div id="bottom">
        <button class='link'><a href='exibiralunos.php'>Cancelar</a></button>
    </div>

    </form>

</body>

</html>