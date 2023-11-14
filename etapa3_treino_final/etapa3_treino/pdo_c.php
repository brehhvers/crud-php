<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    echo "Sem permissão para acesso a página<br>";
    echo '<a href="index.php">Ir para página inicial</a>';
    exit;
}

require ('pdo_con.php');
// Função para inserir um novo registro no banco de dados
function inserirRegistro($pdo, $nome, $email, $senha) {
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
    return $stmt->execute();
}

// Processar o formulário para inserir um novo registro
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (inserirRegistro($pdo, $nome, $email, $senha)) {
        $_SESSION['mensagem'] = 'Registro inserido com sucesso!';
    } else {
        $_SESSION['mensagem'] = 'Erro ao inserir o registro.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulário CRUD com PHP e MySQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1>INSERIR REGISTRO - CREATE</h1>

    <?php if (isset($_SESSION['mensagem'])): ?>
        <p><?php echo $_SESSION['mensagem']; ?></p>
        <?php unset($_SESSION['mensagem']); ?>
    <?php endif; ?>

    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <input type="submit" name="submit" class="btn btn-primary btn-sm" value="Inserir Registro">
    </form>    
    <hr>
    <a href="dashboard.php" class="btn btn-outline-secondary btn-sm">DASHBOARD</a>
    <a href="pdo_r.php" class="btn btn-outline-primary btn-sm">VOLTAR</a>
</body>
</html>
