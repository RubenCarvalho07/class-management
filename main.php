<?php
    require "conexao.php";
    $conexao = conexao_db();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turma</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        h2 {
            margin-top: 0;
            padding-bottom: 10px;
            border-bottom: 2px solid #007bff;
            color: #007bff;
            text-transform: uppercase;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            background-color: #e9ecef;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
            text-transform: uppercase;
        }
        td {
            color: #555;
        }
        button {
            padding: 12px 24px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            margin: 0 auto;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        a {
            text-decoration: none;
            color: #fff;
        }
        button a {
            color: #fff;
        }
        .add-button-container {
            text-align: center;
        }
        .add-button-container button {
            margin-top: 20px;
        }
        .add-button-container button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

<h2>Alunos</h2>
<table>
    <tr>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>Media</th>
    </tr>
    <?php
    $sql = "SELECT id, nome, sobrenome, notaMat, notaPort FROM alunos_info";
    $resultado = mysqli_query($conexao, $sql);

   if (mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $linha['nome'] . "</td>";
            echo "<td>" . $linha['sobrenome'] . "</td>";
            echo "<td>" . ($linha['notaMat'] + $linha['notaPort']) / 2 . "</td>";
            echo "<td> <a href='edit_delete.php?id=" . $linha['id'] . "'><button>Editar/Apagar</button></a> </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Nenhum aluno encontrado</td></tr>";
    }
    ?>
</table>
<div class="add-button-container">
    <a href="addStudent.php"><button>Adicionar Aluno</button></a>
</div>

<h2>Professores</h2>
<table>
    <tr>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>Disciplina</th>
    </tr>
    <?php
    $sql = "SELECT id, nome, sobrenome, disciplina FROM profs_info";
    $resultado = mysqli_query($conexao, $sql);

   if (mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $linha['nome'] . "</td>";
            echo "<td>" . $linha['sobrenome'] . "</td>";
            echo "<td>" . $linha['disciplina'] . "</td>";
            echo "<td> <a href='edit_delete_profs.php?id=" . $linha['id'] . "'><button>Editar/Apagar</button></a> </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Nenhum professor encontrado</td></tr>";
    }
    ?>
</table>
<div class="add-button-container">
    <button><a href="addProf.php">Adicionar Professor</a></button>
</div>

<h2>Notas por Disciplina</h2>
<table>
    <tr>
        <th>Alunos</th>
        <th>Matemática</th>
        <th>Português</th>
    </tr>
    <?php
    $sql = "SELECT nome, sobrenome, notaMat, notaPort FROM alunos_info";
    $resultado = mysqli_query($conexao, $sql);

   if (mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $linha['nome'] . $linha['sobrenome'] . "</td>";
            echo "<td>" . $linha['notaMat'] . "</td>";
            echo "<td>" . $linha['notaPort'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Nenhum aluno encontrado</td></tr>";
    }
    ?>
</table>
<div class="add-button-container">
    <button><a href="grades.php">Adicionar/Alterar Notas</a></button>
</div>

</body>
</html>
