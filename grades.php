<?php
require "conexao.php";
$conexao = conexao_db();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['inserir'])) {
    if (!empty($_POST['id_aluno']) && !empty($_POST['notaMat']) && !empty($_POST['notaPort'])) {
        $id_aluno = $_POST['id_aluno'];
        $notaMat = $_POST['notaMat'];
        $notaPort = $_POST['notaPort'];

        $sql = "UPDATE alunos_info SET notaMat = '$notaMat', notaPort = '$notaPort' WHERE id = $id_aluno";

        if (mysqli_query($conexao, $sql)) {
            header("Location: main.php");
            exit();
        } else {
            echo "Erro ao atualizar notas: " . mysqli_error($conexao);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Notas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            padding: 10px;
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
        form {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button[type="submit"] {
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
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h2>Adicionar Notas</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Sobrenome</th>
    </tr>
    <?php

    $sql = "SELECT id, nome, sobrenome FROM alunos_info";
    $resultado = mysqli_query($conexao, $sql);

   if (mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $linha['id'] . "</td>";
            echo "<td>" . $linha['nome'] . "</td>";
            echo "<td>" . $linha['sobrenome'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Nenhum aluno encontrado</td></tr>";
    }
    ?>
</table>

<form action="grades.php" method="post">
    <label for="id_aluno">ID do Aluno:</label>
    <input type="text" id="id_aluno" name="id_aluno" required>
    
    <label for="notaPort">Nota de Português:</label>
    <input type="text" id="notaPort" name="notaPort" required>
    
    <label for="notaMat">Nota de Matemática:</label>
    <input type="text" id="notaMat" name="notaMat" required>
    
    <button type="submit" name="inserir">Adicionar Notas</button>
</form>

</body>
</html>
