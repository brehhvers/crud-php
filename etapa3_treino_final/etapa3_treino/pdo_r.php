<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    echo "Sem permissão para acesso a página<br>";
    echo '<a href="index.php">Ir para página inicial</a>';
    exit;
}

require ('pdo_con.php');
// Função para listar todos os registros do banco de dados
function listarRegistros($pdo) {
    $sql = "SELECT * FROM usuarios";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// Listar registros
$registros = listarRegistros($pdo);
?>

<!DOCTYPE html>
<html>
<head>
    <title>TPA - Professor Halley</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h3>GERENCIANDO OS DADOS</h3>
    <?php if (isset($_SESSION['mensagem'])): ?>
        <p><?php echo $_SESSION['mensagem']; ?></p>
        <?php unset($_SESSION['mensagem']); ?>
    <?php endif; ?>

    <h2>Registros:</h2>
    <ul>
        <?php foreach ($registros as $registro): ?>
            <li><?php echo $registro['id']; ?> - <?php echo $registro['nome']; ?> - <?php echo $registro['email']; ?> | <a class="btn btn-outline-info btn-sm"  href="pdo_u.php?id=<?php echo $registro['id']; ?>"> EDITAR </a>| 
            <a class="btn btn-outline-danger btn-sm"  href="pdo_d.php?id=<?php echo $registro['id']; ?>">EXCLUIR </a></li>
        
        <?php endforeach; ?>
    </ul>
    <hr>
    <a href="dashboard.php" class="btn btn-primary">DASHBOARD</a>
    <a href="logout.php" class="btn btn-secondary">SAIR</a>
</body>
</html>
