<?php
require "conexao.php";
$conexao = conexao_db();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['inserir'])) {
    if (!empty($_POST['nome']) && !empty($_POST['sobrenome'])) {
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $notas = 0;

        $sql = "INSERT INTO alunos_info (nome, sobrenome, notaMat, notaPort) VALUES ('$nome', '$sobrenome', $notas, $notas)";

        if (mysqli_query($conexao, $sql)) {
            header("Location: main.php");
            exit();
        } else {
            echo "Erro ao adicionar aluno: " . mysqli_error($conexao);
        }
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Aluno</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        h2 {
            color: #333;
            margin-top: 30px;
            margin-bottom: 20px;
            text-align: center;
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
    </style>
</head>
<body>

<h2>Adicionar Aluno</h2>

<form action="addStudent.php" method="post">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>

    <label for="sobrenome">Sobrenome:</label>
    <input type="text" id="sobrenome" name="sobrenome" required>

    <button type="submit" name="inserir">Adicionar Aluno</button>
</form> 

</body>
</html>
