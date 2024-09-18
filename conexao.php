<?php
function conexao_db() {
    $servidor= "localhost";
    $nomebd = "escola";
    $utilizador = "root";
    $pass = "";
    $conexao = mysqli_connect($servidor, $utilizador, $pass, $nomebd);
    if (mysqli_connect_errno()) {
        throw new Exception (mysqli_connect_error(), mysqli_connect_errno());
    }
    mysqli_set_charset ($conexao, "utf8");
    return $conexao;
}
?>