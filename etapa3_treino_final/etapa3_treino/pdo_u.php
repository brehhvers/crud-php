<?php
require ('pdo_con.php');
session_start();

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Função para listar todos os registros do banco de dados
    function listarRegistros($pdo, $id) {
        $sql = "SELECT * FROM usuarios WHERE id = $id";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        // Listar registros
        $registros = listarRegistros($pdo, $id);
        foreach ($registros as $registro) {
            if ($registro['id'] == $id) {
                $aux = true;
            }
        }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>GERENCIAR CADASTRO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h3>Editar Usuário</h3>
    <?php if (isset($aux)) : ?>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $registro['nome']; ?>" required>
            <br>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $registro['email']; ?>" required>
            <br>
            <label>Senha:</label>
            <input type="text" name="senha" value="<?php echo $registro['senha']; ?>" required>
            <br>
            <button type="submit" class="btn btn-primary">SALVAR</button>
            <a href="pdo_r.php" class="btn btn-secondary">CANCELAR</a>
        </form>
    <?php else : ?>
        <p>Usuario não encontrado.</p>
    <?php endif; ?>
</body>
</html>
