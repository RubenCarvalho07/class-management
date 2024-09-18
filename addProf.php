    <?php
    require "conexao.php";
    $conexao = conexao_db();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['inserir'])) {
        if (!empty($_POST['nome']) && !empty($_POST['sobrenome']) && !empty($_POST['disciplina'])) {
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $disciplina = $_POST['disciplina'];

            $sql = "INSERT INTO profs_info (nome, sobrenome, disciplina) VALUES ('$nome', '$sobrenome', '$disciplina')";

            if (mysqli_query($conexao, $sql)) {
                header("Location: main.php");
                exit();
            } else {
                echo "Erro ao adicionar professor: " . mysqli_error($conexao);
            }
        }
    }
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adicionar Professor</title>
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

    <h2>Adicionar Professor</h2>

    <form action="addProf.php" method="post">
        <label for="nome">Nome do Professor:</label>
        <input type="text" id="nome" name="nome" required>
        
        <label for="sobrenome">Sobrenome do Professor:</label>
        <input type="text" id="sobrenome" name="sobrenome" required>

        <label for="disciplina">Disciplina:</label>
        <input type="radio" id="disciplina" name="disciplina" value="Matemática" required>Matemática
        <input type="radio" id="disciplina" name="disciplina" value="Português" required>Português
        
        <button type="submit" name="inserir">Adicionar Professor</button>
    </form>

    </body>
    </html>