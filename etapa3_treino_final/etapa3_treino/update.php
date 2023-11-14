<?php
echo "Atualizando dados abaixo... <br>";
require ('pdo_con.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    echo "<hr>";
 
    // Função para Atualizar o registro no banco de dados
    function atualizarRegistro($pdo, $id, $nome, $email, $senha) {
        $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', senha = '$senha' WHERE id = $id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute();
    }
}
if (atualizarRegistro($pdo, $id, $nome, $email, $senha)) {
    echo "Registro atualizado com sucesso!<br>" . "<a href='index.php'>HOME</a>";
} else {
    echo 'Erro ao inserir o registro.';
}
?>