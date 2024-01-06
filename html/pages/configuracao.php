<?php 

session_start();

$usuario = $_SESSION['usuario'];

if(!isset($_SESSION['usuario'])){
  header('Location: index.php');
}

include 'conexao.php';

$sql = "SELECT `nivel_usuario`, `id_usuario` FROM `usuarios` WHERE `mail_usuario` = '$usuario' and `status` = 'Ativo'";
$buscar = mysqli_query($conexao, $sql);
$array = mysqli_fetch_array($buscar);
$nivel = $array['nivel_usuario'];
$idUsuario = $array['id_usuario'];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Infinite Management - Configuração</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="zoom sidebar-brand d-flex align-items-center justify-content-center" href="menu.php"
        title="Ir para o início" data-toggle="tooltip" data-placement="right">
        <div class="sidebar-brand-icon">
          <img src="../../img/sistema/Infinite Management.png" alt="Logo Infinite Management" width="70px">
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Home
      </div>

      <!-- Nav Item - Dashboard -->
      <li class="zoom nav-item" title="Visualize gráficos, lucro e despesa do seu negócio" data-toggle="tooltip"
      data-placement="right" >
        <a class="nav-link" href="menu.php">
          <i class="fas fa-chart-line"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Telas
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="zoom nav-item" title="Faça a venda do seu produto" data-toggle="tooltip" data-placement="right">
        <a class="nav-link" href="vendas.php">
          <i class="fas fa-cash-register"></i>
          <span>Vendas</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="zoom nav-item" title="Visualize todos os produtos 'Comum' e 'Preparo'" data-toggle="tooltip"
      data-placement="right">
        <a class="nav-link" href="produtos.php">
          <i class="fas fa-boxes"></i>
          <span>Produtos</span>
        </a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="zoom nav-item" title="Visualize todos os clientes cadastrados" data-toggle="tooltip"
      data-placement="right">
        <a class="nav-link collapsed" href="clientes.php">
          <i class="fas fa-users"></i>
          <span>Clientes</span>
        </a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="zoom nav-item" title="Visualize tudo o que você tem em estoque" data-toggle="tooltip"
      data-placement="right">
        <a class="nav-link" href="estoque.php">
          <i class="fas fa-box-open"></i>
          <span>Estoque</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Outros
      </div>

      <!-- Configurações -->
      <li class="nav-item active">
          <div title="Configure o seu ambiente e veja a opção de ajuda para tirar dúvidas" data-toggle="tooltip"
          data-placement="right">
          <a class="zoom nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-cogs"></i>
            <span>Configurações</span>
          </a>
        </div>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Minha conta:</h6>
            <a class="collapse-item" href="configuracao.html">Configurações</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Ajuda:</h6>
            <a class="collapse-item" href="codigos_de_erro.html">Códigos de erro</a>
          </div>
        </div>
      </li>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn text-gray-900 d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Page Heading -->
          <h1 class="h4 mt-1 mr-2 text-gray-800">Configurações</h1>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Abrir tela da cozinha em uma nova aba -->
            <li class="zoom nav-item dropdown no-arrow mx-1" title="Visualize o que ocorre na cozinha nesse exato momento" data-toggle="tooltip"
            data-placement="bottom">
              <a class="nav-link" href="cozinha.html" id="telaCozinha" target="__blank" title="Abrir a tela da cozinha">
                <i class="fas fa-external-link-alt"></i>
              </a>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="zoom nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>

                <!-- Counter - Alerts -->
                <span id="num_notificacao" class="badge badge-danger badge-counter"></span>
                
              </a>

              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in pt-0 drop-notificacao">

                <div class="header card-header py-3 d-flex flex-row align-items-center justify-content-between bg-gradient-primary">
                  <h6 class="m-0 font-weight-bold text-gray-100">Alertas</h6>
                </div>

                <div id="lista_de_notificacao" class=" overflow-auto" style="height: 40vh;"
                  onclick="event.stopPropagation()">

                  <!-- LISTAGEM DOS ALERTAS DO DROPDOWN AQUI -->

                  <div class="d-flex align-items-center mt-2">
                    <div class="ml-auto mr-auto text-xs">
                      <span class="font-weight-bold">Nenhum alerta encontrado</span>
                    </div>
                  </div>

                </div>

              </div>

            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrador</span>
                <img class="img-profile rounded-circle" src="../../img/default-avatar.png" width="60px" height="60px">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Minha conta
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Configurações
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Log de atividade
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-power-off fa-sm fa-fw mr-2 text-gray-400"></i>
                  Sair
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deseja sair da conta?</h5>
          <button class="zoom close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione "Sair" abaixo para deslogar da sua conta.</div>
        <div class="modal-footer">
          <button class="zoom btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="zoom btn btn-primary" href="index.php">Sair</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>
  <script src="../../js/ajax/ajax_global.js"></script>
  <script src="../../js/utils.js"></script>

</body>

</html>