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

  <title>Infinite Management - Clientes</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.css" rel="stylesheet">
  <link href="../../css/animate.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
      <li class="zoom nav-item active" title="Visualize todos os clientes cadastrados" data-toggle="tooltip"
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
          <h1 class="h4 mt-1 mr-2 text-gray-800">Clientes</h1>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Abrir tela da cozinha em uma nova aba -->
            <li class="zoom nav-item dropdown no-arrow mx-1"
              title="Visualize o que ocorre na cozinha nesse exato momento" data-toggle="tooltip"
              data-placement="bottom">
              <a class="nav-link" href="cozinha.php" id="telaCozinha" target="__blank" title="Abrir a tela da cozinha">
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

          <!-- Datables Produto -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 bg-gradient-primary">
              <h6 class="m-0 font-weight-bold text-light d-inline">Meus Clientes</h6>
              <div id="refresh-table" class="text-right d-inline text-light cursor"><i id="icon-refresh"
                  class="fas fa-sync-alt" style="font-size: x-large;float: right;"
                  title="Clique para atualizar a tabela" data-toggle="tooltip" data-placement="left"></i></div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="tabelaClientes" width="100%" cellspacing="0">
                  <thead class="thead-light">
                    <tr>
                      <th title="A coluna ID representa o código do seu cliente" data-toggle="tooltip"
                        data-placement="bottom">ID</th>
                      <th title="A coluna Nome contém os nomes de seus clientes" data-toggle="tooltip"
                        data-placement="bottom">Nome</th>
                      <th
                        title="A coluna Situação contém em que situação o seu cliente está, sendo: Em dia, Em aberto e Em débito"
                        data-toggle="tooltip" data-placement="bottom">Situação</th>
                      <th title="A coluna divida corresponde a atual divida do cliente selecionado"
                        data-toggle="tooltip" data-placement="bottom">Divida</th>
                      <th title="A coluna Tipo contém em que tipo de cliente é, sendo: Comum ou Mensal"
                        data-toggle="tooltip" data-placement="bottom">Tipo</th>
                      <th title="A coluna Status informa se o cliente está Ativo ou Desativo" data-toggle="tooltip"
                        data-placement="bottom">Status</th>
                      <th title="A coluna Data de Cadastro informa o dia/mês/ano em que o cliente foi cadastrado"
                        data-toggle="tooltip" data-placement="bottom">Data de Cadastro</th>
                      <th title="A coluna Descrição contém mais informações do cliente" data-toggle="tooltip"
                        data-placement="bottom">Descrição</th>
                    </tr>
                  </thead>
                  <tfoot class="thead-light">
                    <tr>
                      <th>ID</th>
                      <th>Nome</th>
                      <th>Situação</th>
                      <th>Divida</th>
                      <th>Tipo</th>
                      <th>Status</th>
                      <th>Data de Cadastro</th>
                      <th>Descrição</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <!-- <tr>
                      <td>1</td>
                      <td>Marcos Pereira</td>
                      <td>Em dia</td>
                      <td>Mensal</td>
                      <td>Ativo</td>
                      <td>20/12/2011</td>
                      <td>Uma descrição qualquer aqui</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Brenda Mendes</td>
                      <td>Em aberto</td>
                      <td>Semanal</td>
                      <td>Ativo</td>
                      <td>20/10/2010</td>
                      <td>Uma descrição qualquer aqui</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Escanor do Sol nascente</td>
                      <td>Em dia</td>
                      <td>N/D</td>
                      <td>Ativo</td>
                      <td>12/04/2005</td>
                      <td>Uma descrição qualquer aqui</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Naruto Uzumaki</td>
                      <td>Em debito</td>
                      <td>Mensal</td>
                      <td>Ativo</td>
                      <td>12/04/2009</td>
                      <td>Uma descrição qualquer aqui</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Sasuke Uchiha</td>
                      <td>Em dia</td>
                      <td>N/D</td>
                      <td>Desativo</td>
                      <td>12/04/2008</td>
                      <td>Uma descrição qualquer aqui</td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>Sakura não sei das quantas</td>
                      <td>Em debito</td>
                      <td>Mensal</td>
                      <td>Desativo</td>
                      <td>12/04/2009</td>
                      <td>Uma descrição qualquer aqui</td>
                    </tr> -->

                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Inicio modal - adicionar cliente -->
  <div class="modal fade" id="modalAdicionar">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">

        <!-- Cabeçalho do modal-->
        <header class="modal-header bg-gradient-primary">

          <i class="far fa-question-circle cursor mt-1 text-light" title="Adicione um novo cliente à sua tabela"
            data-toggle="tooltip" data-placement="top"></i>

          <h4 class="modal-title text-gray-100 w-100 text-center font-weight-bold">Adicionar cliente</h4>
          <span id="fechar-add-cli" class="zoom text-danger cursor" data-dismiss="modal"
            title="Fechar e cancelar adição">
            <i class="fas fa-times text-danger"></i>
          </span>
        </header>

        <!-- Corpo do modal -->
        <section class="modal-body">

          <form action="" class="needs-validation" id="add-cliente" novalidate>

            <!-- Nome cliente -->
            <div class="input-group mb-2 w-100">
              <div class="input-group-prepend" title="Nome do cliente">
                <label for="id-add-nome-cliente" class="input-group-text font-weight-bold normalize-label-input"><span
                    class="w-100">Nome</span></label>
              </div>
              <input type="text" class="form-control" name="add-nome-cliente" id="id-add-nome-cliente"
                placeholder="Ex: Matilda Best" title="Nome" maxlength="50" required />


            </div>

            <div class="input-group mb-2 w-100">
              <!-- Situação cliente -->
              <div class="input-group-prepend" title="Situação do cliente">
                <label for="id-add-situacao-cliente"
                  class="input-group-text font-weight-bold normalize-label-input"><span
                    class="w-100">Situação</span></label>
              </div>

              <select class="form-control mr-2 normalize-input-border" name="add-situacao-cliente"
                id="id-add-situacao-cliente" title="Situação" required>
                <option value="">- - -</option>
                <option value="1">Em dia</option>
                <option value="2">Em aberto</option>
                <option value="3">Em débito</option>
              </select>

              <!-- Tipo de cliente -->
              <div class="input-group-prepend" title="Tipo de cliente">
                <label for="id-add-tipo-cliente" class="input-group-text font-weight-bold normalize-label-input"><span
                    class="w-100">Tipo</span></label>
              </div>

              <select class="form-control" name="add-tipo-cliente" id="id-add-tipo-cliente" title="Tipo" required>
                <option value="">- - -</option>
                <option value="1">Comum</option>
                <option value="2">Mensal</option>
              </select>
            </div>

            <!-- Status do cliente -->
            <div class="input-group mb-2 w-100">

              <div class="input-group-prepend" title="Status do cliente">
                <label for="id-add-custo-cliente" class="input-group-text font-weight-bold normalize-label-input"><span
                    class="w-100">Status</span></label>
              </div>

              <select class="form-control mr-2 normalize-input-border" name="add-status-cliente"
                id="id-add-status-cliente" title="Status" required>
                <option value="">- - -</option>
                <option value="1" selected>Ativo</option>
              </select>




              <!-- Data de cadastro do cliente -->
              <div class="input-group-prepend" title="Data de cadastro do cliente">
                <label for="id-add-data-cliente" class="input-group-text font-weight-bold normalize-label-input"><span
                    class="w-100">Data Cad</span></label>
              </div>
              <input type="date" class="form-control" name="add-data-cliente" id="id-add-data-cliente"
                title="Data de cadastro" required />

            </div>

            <!-- Descrição cliente -->
            <label for="id-add-desc-cliente" class="font-weight-bold mb-0">Descrição</label>

            <textarea type="number" class="form-control" name="add-desc-cliente" id="id-add-desc-cliente"
              placeholder="Escreva uma descrição para seu cliente ..." title="Descrição" maxlength="255"
              required></textarea>

            <!-- Botões do formulário -->
            <div class="w-100 text-right">
              <input type="submit" class="zoom btn btn-success font-weight-bold mt-2 mr-2 pl-3 pr-3 pt-2 pb-2"
                value="Adicionar" title="Adicionar o cliente" />

              <input type="reset" id="reseta_modal_add_cli"
                class="zoom btn btn-outline-dark font-weight-bold mt-2 pl-3 pr-3 pt-2 pb-2" value="Limpar"
                title="Limpar campos" />
            </div>

          </form>
        </section>

      </div>
    </div>
  </div>
  <!-- Fim modal -->


  <!-- Inicio modal - alterar cliente -->
  <div class="modal fade" id="modalAlterar">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">

        <!-- Cabeçalho do modal-->
        <header class="modal-header bg-gradient-primary">

          <i class="far fa-question-circle cursor mt-1 text-light"
            title="Altere os dados do cliente selecionado em sua tabela" data-toggle="tooltip" data-placement="top"></i>

          <h4 class="modal-title text-gray-100 w-100 text-center font-weight-bold">Alterar dados de cliente</h4>
          <span id="fechar-alt" class="zoom text-danger cursor" data-dismiss="modal"
            title="Fechar e cancelar a alteração">
            <i class="fas fa-times text-danger"></i>
          </span>
        </header>

        <!-- Corpo do modal -->
        <section class="modal-body">

          <form action="" class="needs-validation" id="altera-cliente" novalidate>

            <!-- Para receber o id para alteração -->
            <input type="number" name="alt-id" id="id-alt-id" class="d-none" readonly required />

            <!-- Nome cliente -->
            <div class="input-group mb-2 w-100">
              <div class="input-group-prepend" title="Nome do cliente">
                <label for="id-alt-nome-cliente" class="input-group-text font-weight-bold normalize-label-input"><span
                    class="w-100">Nome</span></label>
              </div>
              <input type="text" class="form-control" name="alt-nome-cliente" id="id-alt-nome-cliente"
                placeholder="Ex: Matilda Best" title="Nome" maxlength="50" required />


            </div>

            <div class="input-group mb-2 w-100">
              <!-- Situação cliente -->
              <div class="input-group-prepend" title="Situação do cliente">
                <label for="id-alt-situacao-cliente"
                  class="input-group-text font-weight-bold normalize-label-input"><span
                    class="w-100">Situação</span></label>
              </div>

              <select class="form-control mr-2 normalize-input-border" name="alt-situacao-cliente"
                id="id-alt-situacao-cliente" title="Situação" required>
                <option value="">- - -</option>
                <option value="1">Em dia</option>
                <option value="2">Em aberto</option>
                <option value="3">Em débito</option>
              </select>

              <!-- Tipo de cliente -->
              <div class="input-group-prepend" title="Tipo de cliente">
                <label for="id-alt-tipo-cliente" class="input-group-text font-weight-bold normalize-label-input"><span
                    class="w-100">Tipo</span></label>
              </div>

              <select class="form-control" name="alt-tipo-cliente" id="id-alt-tipo-cliente" title="Tipo" required>
                <option value="">- - -</option>
                <option value="1">Comum</option>
                <option value="2">Mensal</option>
              </select>
            </div>

            <!-- Status do cliente -->
            <div class="input-group mb-2 w-100">
              <!-- Status do cliente -->
              <div class="input-group-prepend" title="Status do cliente">
                <label for="id-alt-custo-cliente" class="input-group-text font-weight-bold normalize-label-input"><span
                    class="w-100">Status</span></label>
              </div>

              <select class="form-control mr-2 normalize-input-border" name="alt-status-cliente"
                id="id-alt-status-cliente" title="Status" required>
                <option value="">- - -</option>
                <option value="1">Ativo</option>
                <option value="2">Desativo</option>
              </select>




              <!-- Data de cadastro do cliente -->
              <div class="input-group-prepend" title="Data de cadastro do cliente">
                <label for="id-alt-data-cliente" class="input-group-text font-weight-bold normalize-label-input"><span
                    class="w-100">Data Cad</span></label>
              </div>
              <input type="date" class="form-control" name="alt-data-cliente" id="id-alt-data-cliente"
                title="Data de cadastro" required readonly />

            </div>

            <!-- Descrição cliente -->
            <label for="id-alt-desc-cliente" class="font-weight-bold mb-0">Descrição</label>

            <textarea type="number" class="form-control" name="alt-desc-cliente" id="id-alt-desc-cliente"
              placeholder="Escreva uma descrição para seu cliente ..." title="Descrição" maxlength="255"
              required></textarea>

            <!-- Botões do formulário -->
            <div class="w-100 text-right">
              <input type="submit" class="zoom btn btn-success font-weight-bold mt-2 mr-2 pl-3 pr-3 pt-2 pb-2"
                value="Alterar" title="Alterar o cliente" />

            </div>


          </form>

        </section>

      </div>
    </div>
  </div>
  <!-- Fim modal -->


  <!-- Inicio modal - deletar cliente -->
  <div class="modal fade" id="modalDesativar">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Cabeçalho do modal-->
        <header class="modal-header bg-warning">

          <i class="far fa-question-circle cursor mt-1 text-gray-900"
            title="Desative todos os clientes selecionados em sua tabela" data-toggle="tooltip"
            data-placement="top"></i>

          <h4 class="modal-title text-gray-900 w-100 text-center font-weight-bold">Atenção</h4>
        </header>

        <!-- Corpo do modal -->
        <section class="modal-body text-center">

          <form action="" class="" id="desativar-cliente">

            <span class="text-lg">
              Você está prestes a <b>desativar</b> <span id="aviso-qtd-selecionado"></span> cliente(s) selecionado(s),
              confirmar está ação ?
            </span>

            <!-- Botões do formulário -->
            <div class="w-100 text-right">
              <input type="submit" class="zoom btn btn-success font-weight-bold mt-2 mr-2 pl-3 pr-3 pt-2 pb-2"
                value="Confirmar ação" title="Confirmar ação" />

              <input type="button" id="canc_desativar"
                class="zoom btn btn-outline-danger font-weight-bold mt-2 pl-3 pr-3 pt-2 pb-2" value="Cancelar"
                title="Cancelar ação" data-dismiss="modal" />
            </div>

          </form>

        </section>

      </div>
    </div>
  </div>
  <!-- Fim modal -->


  <!-- Inicio modal - pagar dívida -->
  <div class="modal fade" id="modalPagarDivida">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Cabeçalho do modal-->
        <header class="modal-header bg-warning">

          <i class="far fa-question-circle cursor mt-1 text-gray-900"
            title="Pague uma quantia ou toda a divida do cliente, basta escolher o preço para e finalizar"
            data-toggle="tooltip" data-placement="top"></i>

          <h4 class="modal-title text-gray-900 w-100 text-center font-weight-bold">Atenção</h4>
        </header>

        <!-- Corpo do modal -->
        <section class="modal-body text-center">

          <form action="" class="needs-validation" id="pagar-divida" novalidate>

            <span class="text-lg">
              Informe o valor para pagar a divida do cliente selecionado
            </span>

            <input type="number" class="d-none" id="id-id-cliente" name="id-cliente" title="ID Cliente" readonly
              onkeydown="return false" />

            <!-- Nome produto -->
            <div class="input-group mb-2 w-100">
              <div class="input-group-prepend" title="Nome do cliente">
                <label for="id-nome-cliente" class="input-group-text font-weight-bold normalize-label-input"><span
                    class="w-100">Nome</span></label>
              </div>
              <input type="text" class="form-control normalize-input-border bg-light" name="nome-cliente"
                id="id-nome-cliente" placeholder="Nome do cliente" title="Nome do cliente" maxlength="50"
                pattern="[^!@#$%¨&*()_+=]+" required readonly onkeydown="return false" />
            </div>

            <div id="corpo-pagar-divida" class="input-group mb-2 mt-2 w-100">

              <!-- Preço a pagar -->
              <div class="input-group-prepend" title="Preço a pagar da divida">
                <label for="id-quantia-pagar-divida"
                  class="input-group-text font-weight-bold normalize-label-input"><span class="w-100">Valor
                    R$</span></label>
              </div>

              <input type="number" step=".01" class="form-control font-weight-bold text-center" name="valor_a_pagar"
                id="id-quantia-pagar-divida" placeholder="Valor a pagar" title="Valor R$" min="0.05" pattern="[0-9]+"
                autocomplete="false" required />

            </div>

            <!-- Seta toda divida no input quando selecionado -->
            <div class="custom-control custom-checkbox"
              title="Selecionando, toda a divida será contabilizada para ser paga" data-toggle="tooltip"
              data-placement="bottom">
              <input type="checkbox" name="pagar-toda-divida" id="check-pagar-toda-divida" class="custom-control-input"
                value="true" />
              <label class="custom-control-label cursor" for="check-pagar-toda-divida">Marque para pagar toda a
                divida</label>
            </div>

            <!-- Botões do formulário -->
            <div class="w-100 text-right">
              <input type="submit" class="zoom btn btn-success font-weight-bold mt-2 mr-2 pl-3 pr-3 pt-2 pb-2"
                value="Pagar" title="Pagar a divida" />

              <input type="button" id="canc_pagamento"
                class="zoom btn btn-outline-danger font-weight-bold mt-2 pl-3 pr-3 pt-2 pb-2" value="Cancelar"
                title="Cancelar" data-dismiss="modal" />
            </div>

          </form>

        </section>

      </div>
    </div>
  </div>
  <!-- Fim modal -->

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
  <script src="../../js/sb-admin-2.js"></script>

  <!-- Page level plugins -->
  <script src="../../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
  <script src="../../vendor/datatables/dataTables.buttons.min.js"></script>
  <script src="../../vendor/bootstrap-notify/bootstrap-notify.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../js/ajax/ajax.notify.js"></script>
  <script src="../../js/my-datatables/datatables-cliente.js"></script>
  <script src="../../js/ajax/ajax_tela_cliente.js"></script>
  <script src="../../js/ajax/ajax_global.js"></script>
  <script src="../../js/utils.js"></script>

</body>

</html>