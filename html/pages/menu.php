<?php 

session_start();

$usuario = $_SESSION['usuario'];

if(!isset($_SESSION['usuario'])){
    header('Location: index.php');
}

include 'conexao.php';

$sql = "SELECT `nivel_usuario` FROM `usuarios` WHERE `mail_usuario` = '$usuario' and `status` = 'Ativo'";
$buscar = mysqli_query($conexao, $sql);
$array = mysqli_fetch_array($buscar);
$nivel = $array['nivel_usuario'];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Infinite Management - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.css" rel="stylesheet">
  <link rel="stylesheet" href="../../css/download-pdf.css" media="print">
  <link rel="stylesheet" href="../../css/normalize.css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled no-print" id="accordionSidebar">

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
      <li class="zoom nav-item active" title="Visualize gráficos, lucro e despesa do seu negócio" data-toggle="tooltip"
        data-placement="right">
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
      <li class="nav-item">
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
            <a class="collapse-item" href="configuracao.php">Configurações</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Ajuda:</h6>
            <a class="collapse-item" href="codigos_de_erro.php">Códigos de erro</a>
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
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow no-print">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn text-gray-900 d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Page Heading -->
          <h1 class="h4 mt-1 text-gray-800">Dashboard</h1>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Abrir tela da cozinha em uma nova aba -->
            <li class="zoom nav-item dropdown no-arrow mx-1"
              title="Visualize o que ocorre na cozinha nesse exato momento" data-toggle="tooltip"
              data-placement="bottom">
              <a class="nav-link" href="cozinha.php" id="telaCozinha" target="__blank">
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

                <div
                  class="header card-header py-3 d-flex flex-row align-items-center justify-content-between bg-gradient-primary">
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

          <!-- Page Heading -->
          <div class="dont-get-pdf d-sm-flex align-items-center justify-content-between mb-4 no-print">

            <button type="button" onclick="window.print()"
              class=" zoom d-none d-sm-inline-block btn btn-sm bg-gradient-primary text-white shadow-sm"><i
                class="zoom fas fa-download fa-sm text-white"></i> Gerar PDF da tela</button>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-8">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-2 font-weight-bold text-primary">Gráfico com lucro mensal</h6>
                  <button type="button" id="btn_altera_grafico" class="btn grafico-barra ml-auto no-print"
                    title="Visualize em gráfico de barra">
                    <i class="fas fa-chart-bar fa-lg text-gray-700"></i>
                  </button>

                  <button type="button" id="atualiza-grafico" class="btn no-print" title="Clique para atualizar o gráfico"
                    data-toggle="tooltip" data-placement="right"><i id="icon-refresh"
                      class="fas fa-sync-alt fa-lg text-gray-700"></i></button>


                </div>

                <!-- Card Body -->
                <div class="card-body ">
                  <div id="grafico-linha" class="chart-area">
                    <canvas id="chart-linha" class=""></canvas>
                  </div>



                  <!-- Testando aqui -->
                  <div id="grafico-barra" class="chart-bar" style="display: none">
                    <canvas id="chart-barra"></canvas>
                  </div>
                </div>

              </div>
            </div>

            <!-- Dados da lateral direita -->
            <div class="col-xl-4 col-lg-4">

              <!-- Card com quantidade do estoque -->
              <div class="col-xl-12 col-md-12 mb-4 my-4 p-0">
                <div class="card border-left-primary shadow py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Meu estoque</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="qtd_produtos_estoque">
                          <!-- QUANTIDADE DE PRODUTOS AQUI -->
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-boxes fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card com lucro do mês -->
              <div class="col-xl-12 col-md-12 mb-4 p-0">
                <div class="card border-left-success shadow py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Lucro (Mês)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="lucro_do_mes">
                          <!-- LUCRO DO MÊS AQUI -->
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card com despesa do mês -->
              <div class="col-xl-12 col-md-12 mb-4 p-0">
                <div class="card border-left-danger shadow py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Despesa (Mês)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="despesa_do_mes">
                          <!-- DESPESA DO MÊS AQUI -->
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>

          <div class="row">


            <div class="col-xl-4 col-lg-5 ml-auto mr-auto" >
              <div class="centralize card shadow mb-4" id="resize">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tipos de pagamentos (Mês Atual)</h6>
                </div>
                <!-- Card Body -->
                <div class="centralize card-body">
                  <!-- Testando aqui -->
                  <div id="grafico-pizza" class="chart-bar">
                    <canvas id="chart-pizza" class=""></canvas>
                  </div>
                  <div class="container-bottom">
                    <hr>
                    <span class="mr-auto ml-auto">Valor em R$ da venda por tipo de pagamento</span>
                  </div>
                </div>
              </div>
            </div>



          </div>



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

          <!-- Page level plugins -->
          <script src="../../vendor/chart.js/Chart.js"></script>

          <!-- Page level custom scripts -->
          <script src="../../js/chart/chart-linha-ganho-mensal.js"></script>
          <script src="../../js/chart/chart-barra-ganho-mensal.js"></script>
          <script src="../../js/chart/chart-pizza-tipos-pagamento.js"></script>
          <script src="../../js/ajax/ajax_tela_dash.js"></script>
          <script src="../../js/ajax/ajax_global.js"></script>
          <script src="../../js/utils.js"></script>

</body>

</html>