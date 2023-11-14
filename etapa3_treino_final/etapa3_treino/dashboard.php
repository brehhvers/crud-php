<!DOCTYPE html>
<html>
<head>
    <?php
    session_start();
    if(!isset($_SESSION['user_id'])) {
        echo "Sem permissão para acesso a página<br>";
        echo '<a href="index.php">Ir para página inicial</a>';
        exit;
    }
    ?>
    <title>Painel do Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="files/avatar.jpg" alt="Logo" style="width:40px;" class="rounded-pill">
    </a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="#">HOME</a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">RELATÓRIOS</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="files/gera_pdf.php" target="_blank">Mensal</a></li>
        <li><a class="dropdown-item" href="files/gera_pdf_tabela.php" target="_blank">Tabela</a></li>
        <li><a class="dropdown-item" href="files/gera_pdf_salario.php" target="_blank">Salário</a></li>
      </ul>
    </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">CADASTROS [CRUD]</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="pdo_r.php">Gerenciar</a></li>
        <li><a class="dropdown-item" href="pdo_c.php">Cadastrar</a></li>
      </ul>
    </li>
    </ul> 
  </div>
</nav>
<div class="container-fluid mt-3">
  <h3>Dashboard</h3>
  <p>Este sistema foi criado com fins didáticos.</p>
</div>
    <hr>
    <a href="logout.php" class="btn btn-secondary">SAIR</a>
</body>
</html>
