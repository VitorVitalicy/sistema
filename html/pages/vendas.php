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

  <title>Infinite Management - Vendas</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.css" rel="stylesheet">
  <link href="../../css/my-style.css" rel="stylesheet">
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
      <li class="zoom nav-item active" title="Faça a venda do seu produto" data-toggle="tooltip" data-placement="right">
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
          <h1 class="h4 mt-1 text-gray-800">Vendas</h1>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Aproveitando as classes do search para adaptar à mobile o Em preparo -->
            <!-- Nav Item - Em preparo -->
            <li class="nav-item dropdown no-arrow d-lg-none">
              <a class="zoom nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-clipboard-list"></i>
              </a>
              <!-- Dropdown - Em preparo -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in dropdown-em-preparo">
                <div class="col-lg-3 col-sm-12">
                  <div class="header mb-2 card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Em preparo</h6>
                  </div>

                  <div class="mb-1 overflow-auto drop-lista-preparo lista-de-pedidos-em-preparo">

                    <!-- LISTAGEM DOS PRODUTOS EM PREPARO DO DROPDOWN AQUI -->

                    <div class="d-flex align-items-center">
                      <div class="ml-auto mr-auto text-xs">
                        <span class="font-weight-bold w-25">Sem pedidos em preparo</span>
                      </div>
                    </div>

                  </div>

                </div>
              </div>
            </li>

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



          <!-- Content row -->
          <div class="row">

            <!-- Content col - Faça pedido-->
            <div class="col-12 col-md-6 col-lg-4">
              <div class="card shadow mb-4 my-h my-h-sm my-h-md">
                <div
                  class="card-header bg-gradient-primary text-gray-100 py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold">Faça pedido</h6>
                  <i class="far fa-question-circle cursor"
                    title="Busque um produto, selecione e confirme com ENTER. Modifique a quantidade caso necessário e adicione o pedido."
                    data-toggle="tooltip" data-placement="top"></i>
                </div>


                <!-- Pesquisa produto -->
                <form id="form-pesquisa-produto" class="p-3" method="POST">


                  <label for="pesquisar-produto" class="h6 mb-0 font-weight-bold">Pesquisar produto</label>
                  <!-- <div class="input-group"> -->
                  <input type="text" id="pesquisa-produto" class="form-control bg-light small text-capitalize"
                    name="pesquisa" placeholder="Ex: coca-cola" autocomplete="off" list="list-pesquisa" minlength="3"
                    maxlength="40">


                  <div id="aviso-pesquisa-produto" class="w-100 text-center text-danger font-weight-bold d-none">
                    <span class="cursor"
                      title="O produto buscado não foi encontrado ou não existe. Cadastre-o ou busque por outro produto."
                      data-toggle="tooltip" data-placement="bottom">Produto não encontrado</span>
                  </div>

                  <datalist id="list-pesquisa">

                    <!-- LISTAGEM DOS PEDIDOS PESQUISADOS DO DATALIST AQUI -->

                  </datalist>


                  <!-- </div> -->

                </form>



                <form id="form-faca-pedido" class="pl-3 pr-3" method="POST">
                  <div class="w-100 text-center mt-2 mb-2">
                    <h3 class="h6 mb-0 font-weight-bold">Características do pedido</h2>
                  </div>


                  <div class="input-group input-group-sm">

                    <div class="input-group-prepend" title="Código do produto">
                      <label class="input-group-text text-small font-weight-bold border-0 normalize-label-input"
                        for="cod-produto"><span class="w-100">CÓD</span></label>
                    </div>
                    <input type="number" id="cod-produto" step=".00" min="0" pattern="[1-9]"
                      class="form-control text-center pr-5 bg-light border-0 small d-block" readonly />
                  </div>


                  <div class="input-group mt-2 input-group-sm">

                    <div class="input-group-prepend" title="Nome do produto">
                      <label class="input-group-text text-capitalize font-weight-bold border-0 normalize-label-input"
                        for="nome-produto"><span class="w-100">NOME</span></label>
                    </div>
                    <input type="text" id="nome-produto" minlength="0" maxlength="40"
                      class="form-control bg-light border-0 small input-group-append" readonly>
                  </div>


                  <div class="input-group mt-2 input-group-sm">

                    <div class="input-group-prepend" title="Quantidade do pedido">
                      <label class="input-group-text font-weight-bold border-0 normalize-label-input"
                        for="qtd-produto"><span class="w-100">QTD</span></label>
                    </div>
                    <input type="number" id="qtd-produto" step=".00" min="1" max="10000" pattern="[1-9]"
                      class="form-control bg-light border-0 small d-block normalize-input-border" required readonly />

                    <label for="" class="m-1"><i class="fas fa-times icon-multiplicar"></i></label>

                    <div class="input-group-prepend" title="Preço do pedido">
                      <label class="input-group-text text-success font-weight-bold border-0 normalize-label-input"
                        for="valor-produto"><span class="w-100">R$</span></label>
                    </div>
                    <input type="number" id="valor-produto" step=".01" min="0"
                      class="form-control bg-light border-0 small input-group-append normalize-input-border" readonly>
                  </div>

                  <hr class="sidebar-divider mt-2">


                  <div class="w-100 text-center">
                    <label for="valor-total-pedido" class="h5 font-weight-bold">Total do pedido</label>
                  </div>

                  <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                      <label class="input-group-text text-success font-weight-bold border-" for="valor-total-pedido"
                        title="Valor total do pedido">R$</label>
                    </div>
                    <input type="number" id="valor-total-pedido" step=".01" min="0"
                      class="col-12 form-control text-center pr-5 bg-light border-small input-group-append" readonly>

                  </div>
                  <div class="w-100 text-center mt-3 mb-2">
                    <button type="button" id="add-pedido" class="btn bg-primary text-light p-3 mb-5 font-weight-bold"
                      title="Nenhum pedido selecionado" disabled style="cursor: not-allowed;">Adicionar pedido</button>
                  </div>
                </form>

              </div>
            </div>

            <!-- Lista de pedidos -->
            <div class="col-12 col-md-6 col-lg-5">
              <div class="card shadow mb-4 my-h my-h-sm my-h-md">
                <div
                  class="card-header bg-primary text-gray-100 py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold">Lista de pedidos</h6>
                  <i class="far fa-question-circle cursor"
                    title="Todos os pedidos que foram feitos e o valor total da compra do cliente" data-toggle="tooltip"
                    data-placement="top"></i>
                </div>
                <div class="p-3">
                  <div class="table-responsive">
                    <table id="listaDePedidos" class="table-striped table-hover table-sm text-center display compact"
                      width="100%" cellspacing="0">
                      <tr>
                        <thead class="thead-light">
                          <th title="Código do produto">Cod</th>
                          <th title="Nome do produto">Nome</th>
                          <th title="Quantidade do produto">QTD</th>
                          <th title="Preço da unidade">R$</th>
                          <th title="Preço total do pedido">Total</th>
                        </thead>
                      </tr>
                      <tbody>
                        
                        <!-- LISTA DE PEDIDOS PARA COMPRA AQUI -->

                      </tbody>
                    </table>
                  </div>

                  <hr class="sidebar-divider mt-0">


                  <div class="text-center mt-2">
                    <label for="valor-total-da-compra" class="h4 font-weight-bold">TOTAL</label>
                    <div class="input-group input-group-lg">


                      <div class="input-group-prepend" title="Valor total da compra">
                        <label for="valor-total-da-compra"
                          class="input-group-text text-success font-weight-bold">R$</label>
                      </div>
                      <input type="number" id="valor-total-da-compra" min="0" step=".01" value="0.00"
                        class="col-12 form-control text-center pr-5 bg-light text-success border- small input-group-append"
                        readonly>

                    </div>
                  </div>

                  <div class="w-100 text-center mt-1">
                    <button type="button" id="finalizar-compra"
                      class="btn bg-success text-light mt-1 mr-1 ml-1 p-2 font-weight-bold" title="Não há compra para finalizar"
                      data-toggle="modal" data-target="#modalFinalizarCompra" disabled style="cursor: not-allowed;" >Finalizar compra</button>
                    <button type="button" id="cancelar-compra"
                      class="btn bg-danger text-light mt-1 mr-1 ml-1 p-2 font-weight-bold" title="Não há compra para cancelar"
                      data-toggle="modal" data-target="#modalCancelarCompra" disabled style="cursor: not-allowed;" >Cancelar compra</button>
                  </div>
                </div>

              </div>
            </div>

            <!-- Em preparo -->
            <div class="col-lg-3 d-none d-lg-inline-block">
              <div class="card shadow mb-4 my-h my-h-sm my-h-md">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Em preparo</h6>
                  <i class="far fa-question-circle cursor"
                    title="Todos os pedidos que estão em preparo na cozinha. Os pedidos com spinner de carregamento informam que ainda está sendo preparado. Após o pedido ficar pronto, clique no botão 'OK' que ficará disponvível para confirmar visualização."
                    data-toggle="tooltip" data-placement="top"></i>
                </div>

                <div class="p-3">
                  <div class="lista-em-preparo overflow-auto">
                    <div class="w-100">
                      <div class="lista-de-pedidos-em-preparo" class="mb-1">

                        <!-- LISTAGEM DOS PRODUTOS EM PREPARO AQUI -->

                        <div class="d-flex align-items-center">
                          <div class="ml-auto mr-auto text-xs">
                            <span class="font-weight-bold w-25">Sem pedidos em preparo</span>
                          </div>
                        </div>


                      </div>
                    </div>
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

  <!-- Inicio modal - deletar produto -->
  <div class="modal fade" id="modalFinalizarCompra">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Cabeçalho do modal-->
        <header class="modal-header bg-warning">

          <i class="far fa-question-circle cursor mt-1 text-gray-900"
            title="Informe o tipo e finalize a compra do cliente" data-toggle="tooltip" data-placement="top"></i>

          <h4 class="modal-title text-gray-900 w-100 text-center font-weight-bold">Atenção</h4>
        </header>

        <!-- Corpo do modal -->
        <section class="modal-body text-center">

          <span class="text-lg">
            Selecione a forma de pagamento e o tipo da compra abaixo para finalizar
          </span>

          <form id="form-pesquisa-cliente" action="">

            <div class="w-100 text-center text-xs mt-3 mb-1"><span>Formas de pagamento</span></div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input cursor" id="formaDePagamento_dinheiro"
                name="formaDePagamento" value="Dinheiro" checked>
              <label class="custom-control-label cursor" for="formaDePagamento_dinheiro">Dinheiro</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input cursor" id="formaDePagamento_debito"
                name="formaDePagamento" value="Débito">
              <label class="custom-control-label cursor" for="formaDePagamento_debito">Débito</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input cursor" id="formaDePagamento_credito"
                name="formaDePagamento" value="Crédito">
              <label class="custom-control-label cursor" for="formaDePagamento_credito">Crédito</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input cursor" id="formaDePagamento_pix" 
               name="formaDePagamento" value="Pix">
              <label class="custom-control-label cursor" for="formaDePagamento_pix">Pix</label>
            </div>
            

            <br />

            <div class="w-100 text-center text-xs mt-3 mb-1"><span>Tipo da compra</span></div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input cursor" id="pagarDepois" name="tipoDeCompra"
                value="Mensal">
              <label class="custom-control-label cursor" for="pagarDepois"
                title="Está opção corresponde a clientes que pagam suas compras mensalmente" data-toggle="tooltip"
                data-placement="top">Pagar depois</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input cursor" id="pagarAgora" name="tipoDeCompra" value="Comum"
                checked>
              <label class="custom-control-label cursor" for="pagarAgora"
                title="Está opção corresponde a clientes comuns, que pagam na hora da compra" data-toggle="tooltip"
                data-placement="top">Pagar agora</label>
            </div>

            <br />

            <div id="corpo-filtro-pesquisa" class="mt-3">
              <div class="w-100 text-center text-xs  mb-1"><span>Filtros de pesquisa</span></div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input cursor" id="filtroFuncionario" name="tipoDeConsumo"
                  value="Funcionario">
                <label class="custom-control-label cursor" for="filtroFuncionario"
                  title="A pesquisa será filtrada somente entre os funcionários" data-toggle="tooltip"
                  data-placement="top">Funcionário</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input cursor" id="filtroCliente" name="tipoDeConsumo"
                  value="Cliente" checked>
                <label class="custom-control-label cursor" for="filtroCliente"
                  title="A pesquisa será filtrada somente entre os clientes" data-toggle="tooltip"
                  data-placement="top">Cliente</label>
              </div>
            </div>

            <div id="corpo-input-id-cliente" class="input-group w-100 mt-2">

              <div class="input-group-prepend ml-5">
                <label for="pesquisa-id-cliente" class="input-group-text font-weight-bold normalize-label-input cursor"
                  title="Tecle ENTER para pesquisar" data-toggle="tooltip" data-placement="left"><span class="w-100"><i
                      class="fas fa-search"></i></span></label>
              </div>
              <input type="number" class="form-control mr-5 normalize-input-border" name="pesquisa-id-cliente"
                id="pesquisa-id-cliente" placeholder="Informe o ID do cliente" min="0" max="9999" pattern="[0-9]+"
                disabled />
            </div>

            <div id="aviso-pesquisa-cliente" class="w-100 text-center text-danger font-weight-bold">
              <span class="cursor" title="O cliente não existe. Cadastre-o para continuar" data-toggle="tooltip"
                data-placement="bottom">Cliente não existe, <a class="text-danger" href="./produtos.php"
                  target="__blank">clique aqui para cadastrar</a></span>
            </div>

            <div id="corpo-input-nome-cliente" class="input-group w-100 mt-2 mb-2">
              <div class="input-group-prepend ml-5">
                <label for="nome-cliente" class="input-group-text font-weight-bold normalize-label-input"><span
                    class="w-100">NOME</span></label>
              </div>
              <input type="text" class="form-control mr-5 normalize-input-border bg-light" name="nome-cliente"
                id="nome-cliente" required readonly />
            </div>


            <input type="submit" value="pesquisar" class="d-none">

          </form>

          <!-- Botões do formulário -->
          <div class="w-100 text-center mt-2">
            <button type="button" id="confirma-finalizar-compra"
              class="zoom btn btn-success font-weight-bold mt-2 mr-2 pl-4 pr-4 pt-2 pb-2">Finalizar</button>

            <button type="button" id="cancelar-venda"
              class="zoom btn btn-outline-danger font-weight-bold mt-2 pl-3 pr-3 pt-2 pb-2"
              data-dismiss="modal">Cancelar</button>
          </div>

        </section>

      </div>
    </div>
  </div>
  <!-- Fim modal -->


  <!-- Inicio modal - deletar produto -->
  <div class="modal fade" id="modalCancelarCompra">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Cabeçalho do modal-->
        <header class="modal-header bg-warning">

          <i class="far fa-question-circle cursor mt-1 text-gray-900"
            title="Cancele a compra do cliente. Está ação não tem retorno" data-toggle="tooltip"
            data-placement="top"></i>

          <h4 class="modal-title text-gray-900 w-100 text-center font-weight-bold">Atenção</h4>
        </header>

        <!-- Corpo do modal -->
        <section class="modal-body text-center">

          <span class="text-lg">
            Você está prestes a <b>CANCELAR</b> toda a lista de compra do seu cliente, confirmar ação ?
          </span>

          <!-- Botões do formulário -->
          <div class="w-100 text-right">
            <button type="button" id="confirma-cancelar-compra"
              class="zoom btn btn-success font-weight-bold mt-2 mr-2 pl-3 pr-3 pt-2 pb-2" data-dismiss="modal">Confirmar
              ação</button>

            <button type="button" id="cancelar-cancelamento"
              class="zoom btn btn-outline-danger font-weight-bold mt-2 pl-3 pr-3 pt-2 pb-2"
              data-dismiss="modal">Cancelar ação</button>
          </div>

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
  <script src="../../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
  <script src="../../vendor/datatables/dataTables.buttons.min.js"></script>
  <script src="../../vendor/bootstrap-notify/bootstrap-notify.js"></script>



  <!-- Page level custom scripts -->
  <script src="../../js/ajax/ajax.notify.js"></script>
  <script src="../../js/my-datatables/datatables-venda.js"></script>
  <script src="../../js/ajax/ajax_tela_venda.js"></script>
  <script src="../../js/ajax/ajax_global.js"></script>
  <script src="../../js/utils.js"></script>

</body>

</html>