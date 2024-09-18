<?php
require "conexao.php";
$conexao = conexao_db();

$id_aluno = isset($_GET['id']) ? $_GET['id'] : null;
if (!$id_aluno) {
    exit("ID do aluno não fornecido.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['inserir'])) {
    if (!empty($_POST['nome']) && !empty($_POST['sobrenome'])) {
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];

        $sql = "UPDATE alunos_info SET nome = '$nome', sobrenome = '$sobrenome' WHERE id = $id_aluno";

        if (mysqli_query($conexao, $sql)) {
            header("Location: main.php");
            exit();
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['inserir2'])) {
    $sql = "DELETE FROM alunos_info WHERE id = $id_aluno";

    if (mysqli_query($conexao, $sql)) {
        header("Location: main.php");
        exit();
    }
}

$sql = "SELECT nome, sobrenome FROM alunos_info WHERE id = $id_aluno";
$resultado = mysqli_query($conexao, $sql);
$aluno = mysqli_fetch_assoc($resultado);

if (!$aluno) {
    exit("Aluno não encontrado.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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

<form action="edit_delete.php?id=<?php echo $id_aluno; ?>" method="post">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?php echo $aluno['nome']; ?>" required>
    
    <label for="sobrenome">Sobrenome:</label>
    <input type="text" id="sobrenome" name="sobrenome" value="<?php echo $aluno['sobrenome']; ?>" required>
    
    <button type="submit" name="inserir">Alterar</button>
    <button type="submit" name="inserir2">Apagar</button>
</form>

</body>
</html>
