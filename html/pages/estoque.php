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

  <title>Infinite Management - Estoque</title>

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
      <li class="zoom nav-item" title="Visualize todos os clientes cadastrados" data-toggle="tooltip"
        data-placement="right">
        <a class="nav-link collapsed" href="clientes.php">
          <i class="fas fa-users"></i>
          <span>Clientes</span>
        </a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="zoom nav-item active" title="Visualize tudo o que você tem em estoque" data-toggle="tooltip"
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
          <h1 class="h4 mt-1 mr-2 text-gray-800">Estoque</h1>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Abrir tela da cozinha em uma nova aba -->
            <li class="zoom nav-item dropdown no-arrow mx-1">
              <a class="nav-link" href="cozinha.php" id="telaCozinha" target="__blank"
                title="Visualize o que ocorre na cozinha nesse exato momento" data-toggle="tooltip"
                data-placement="bottom">
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
              <h6 class="m-0 font-weight-bold text-light d-inline">Meu Estoque</h6>
              <div id="refresh-table" class="text-right d-inline text-light cursor"
                title="Clique para atualizar a tabela"><i id="icon-refresh" class="fas fa-sync-alt"
                  style="font-size: x-large;float: right;" title="Clique para atualizar a tabela" data-toggle="tooltip"
                  data-placement="left"></i></div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="tabelaEstoque" width="100%" cellspacing="0">
                  <thead class="thead-light">
                    <tr>
                      <th title="A coluna ID contém o código do seus produtos" data-toggle="tooltip"
                        data-placement="bottom">ID
                      </th>
                      <th title="A coluna Nome contém o nome de seus produtos" data-toggle="tooltip"
                        data-placement="bottom">Nome
                      </th>
                      <th title="A coluna Marca é a marca dos seus produtos" data-toggle="tooltip"
                        data-placement="bottom">
                        Marca</th>
                      <th title="A coluna Tipo especifica se o produto é para venda ou não" data-toggle="tooltip"
                        data-placement="bottom">Tipo</th>
                      <th title="A coluna Status representa o status atual do produto com base na qtd atual e mínima"
                        data-toggle="tooltip" data-placement="bottom">
                        Status</th>
                      <th title="A coluna Qtd Atual refere-se a quantia de unidades do produto" data-toggle="tooltip"
                        data-placement="bottom">Qtd Atual</th>
                      <th title="A coluna Qtd mínima refere-se a quantia mínima que o produto deve ter"
                        data-toggle="tooltip" data-placement="bottom">Qtd Mínima</th>
                      <th title="A coluna Custo representa o valor que foi pago no produto" data-toggle="tooltip"
                        data-placement="bottom">Custo R$</th>
                      <th title="A coluna Preço representa o valor que será cobrado por esse produto"
                        data-toggle="tooltip" data-placement="bottom">Preço R$</th>
                    </tr>
                  </thead>
                  <tfoot class="thead-light">
                    <tr>
                      <th>ID</th>
                      <th>Nome</th>
                      <th>Marca</th>
                      <th>Tipo</th>
                      <th>Status</th>
                      <th>Qtd Atual</th>
                      <th>Qtd Mínima</th>
                      <th>Custo R$</th>
                      <th>Preço R$</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <!-- <tr>
                      <td>1</td>
                      <td>Cerveja</td>
                      <td>Itaipava</td>
                      <td>Venda</td>
                      <td>Alto</td>
                      <td>150</td>
                      <td>R$2.50</td>
                      <td>R$4.00</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Cerveja</td>
                      <td>Brahma</td>
                      <td>Venda</td>
                      <td>Médio</td>
                      <td>25</td>
                      <td>R$1.99</td>
                      <td>R$3.20</td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>Cerveja</td>
                      <td>Budweiser</td>
                      <td>Venda</td>
                      <td>Baixo</td>
                      <td>6</td>
                      <td>R$3.99</td>
                      <td>R$6.30</td>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td>Vinho</td>
                      <td>Marca X</td>
                      <td>Venda</td>
                      <td>Médio</td>
                      <td>15</td>
                      <td>R$10.00</td>
                      <td>R$16.30</td>
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





  <!-- Inicio modal - adicionar produto -->
  <div class="modal fade" id="modalAdicionar">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">

        <!-- Cabeçalho do modal-->
        <header class="modal-header bg-gradient-primary">

          <i class="far fa-question-circle cursor mt-1 text-light"
            title="Adicione um novo produto a sua tabela ou adicione unidades a um produto já existente que esteja selecionado"
            data-toggle="tooltip" data-placement="top"></i>

          <h4 class="modal-title text-gray-100 w-100 text-center font-weight-bold">Adicionar produto</h4>
          <span id="fechar-add-est" class="zoom text-danger cursor" data-dismiss="modal"
            title="Fechar e cancelar adição">
            <i class="fas fa-times text-danger"></i>
          </span>
        </header>

        <!-- Corpo do modal -->
        <section class="modal-body">

          <form class="needs-validation" id="add-estoque" method="POST" enctype="multipart/form-data" novalidate>

            <!-- Nome produto -->
            <div class="input-group mb-2 w-100">
              <div class="input-group-prepend" title="Nome do produto">
                <label for="id-add-nome-estoque" class="input-group-text font-weight-bold normalize-label-input"><span
                    class="w-100">Nome</span></label>
              </div>
              <input type="text" class="form-control normalize-input-border" name="add-nome-estoque"
                id="id-add-nome-estoque" title="Nome" placeholder="Ex: Coca-cola" maxlength="50"
                pattern="[^!@#$%¨&*()_+=]+" required />



              <!-- Marca produto -->
              <div class="input-group-prepend" title="Marca do produto">
                <label for="id-add-marca-estoque"
                  class="input-group-text ml-2 font-weight-bold normalize-label-input"><span
                    class="w-100">Marca</span></label>
              </div>
              <input type="text" class="form-control normalize-input-border" name="add-marca-estoque"
                id="id-add-marca-estoque" title="Marca" placeholder="Ex: Coca-Cola" maxlength="50"
                pattern="[^!@#$%¨&*()_+=]+" required />
            </div>


            <div class="input-group mb-2 w-100">
              <!-- Tipo produto -->
              <div class="input-group-prepend" title="Tipo de produto">
                <label for="id-add-tipo-estoque" class="input-group-text font-weight-bold normalize-label-input"><span
                    class="w-100">Tipo</span></label>
              </div>



              <select class="form-control normalize-input-border mr-2" name="add-tipo-estoque" id="id-add-tipo-estoque"
                title="Tipo" required>
                <option value="">- - -</option>
                <option value="1">Comum</option>
                <option value="2">Preparo</option>
                <option value="3">Interno</option>
              </select>




              <!-- status produto -->
              <div class="input-group-prepend" title="Status de produto">
                <label for="id-add-status-estoque" class="input-group-text font-weight-bold normalize-label-input"><span
                    class="w-100">Status</span></label>
              </div>



              <select class="form-control normalize-input-border" name="add-status-estoque" id="id-add-status-estoque"
                title="Status" required>
                <option value="">- - -</option>
                <option value="1">Ativo</option>
                <option value="2">Desativo</option>
              </select>
            </div>



            <div class="input-group mb-2 w-100">

              <!-- Quantidade produto -->
              <div class="input-group-prepend" title="Quantidade do produto">
                <label for="id-add-quantidade-estoque"
                  class="input-group-text font-weight-bold normalize-label-input"><span class="w-100">Qtd
                    Atual</span></label>
              </div>
              <input type="number" class="form-control normalize-input-border mr-2" name="add-quantidade-estoque"
                id="id-add-quantidade-estoque" title="Qtd Atual" placeholder="Ex: 50" min="0" max="255" maxlength="4"
                pattern="[0-9]+" required />




              <!-- Quantidade mínima produto -->
              <div class="input-group-prepend" title="Quantidade mínima do produto">
                <label for="id-add-quantidade-minima-estoque"
                  class="input-group-text font-weight-bold normalize-label-input"><span class="w-100">Qtd
                    Mín</span></label>
              </div>
              <input type="number" class="form-control normalize-input-border" name="add-quantidade-minima-estoque"
                id="id-add-quantidade-minima-estoque" title="Qtd Min" placeholder="Ex: 15" min="0" max="255"
                pattern="[0-9]+" maxlength="4" required />
            </div>

            <div class="input-group mb-2 w-100">

              <!-- Custo produto -->
              <div class="input-group-prepend" title="Custo do produto">
                <label for="id-add-custo-estoque" class="input-group-text font-weight-bold normalize-label-input"><span
                    class="w-100">Custo
                    R$</span></label>
              </div>
              <input type="number" step=".01" class="form-control normalize-input-border mr-2" name="add-custo-estoque"
                title="Custo" id="id-add-custo-estoque" placeholder="7.00" min="0" required />


              <!-- Preço produto -->
              <div class="input-group-prepend" title="Preço do produto">
                <label for="id-add-preco-estoque" class="input-group-text font-weight-bold normalize-label-input"><span
                    class="w-100">Preço
                    R$</span></label>
              </div>
              <input type="number" step=".01" class="form-control normalize-input-border" name="add-preco-estoque"
                id="id-add-preco-estoque" title="Preço" placeholder="10.00" min="0" required />

              <input type="file" id="id-add-imagem-estoque" name="add-imagem-estoque" class="d-none" title="Imagem"
                accept="image/png, image/jpeg, .jpg" />

            </div>


            <div id="corpo-add-mais-unid" class="input-group mb-2 w-100">

              <div class="input-group-prepend" title="Menos um">
                <button id="minus-add-unid" type="button" title="Menos um"
                  class="zoom btn btn-outline-danger input-group-text font-weight-bold normalize-label-input ml-5"><span
                    class="w-100"><i class="fas fa-minus"></i></span></button>
              </div>

              <input type="number" step=".00" class="form-control font-weight-bold text-center"
                name="add-mais-unid-estoque" title="Add Mais" id="id-add-mais-unid-produto"
                placeholder="Quantos quer adicionar ?" min="1" max="255" pattern="[0-9]+" required disabled
                onkeydown="return false" />


              <div class="input-group-append" title="Mais um">
                <button id="plus-add-unid" type="button"
                  class="zoom btn btn-outline-success input-group-text font-weight-bold normalize-label-input mr-5 "
                  style="border-top-left-radius: 0!important;border-bottom-left-radius: 0!important;"><span
                    class="w-100"><i class="fas fa-plus"></i></span></button>

              </div>
            </div>

            <div class="w-100 text-center">
              <img id="preview-image-add-estoque" alt="Imagem do produto" />
            </div>

            <!-- Botões do formulário -->
            <div class="w-100 text-right">

              <label for="id-add-imagem-estoque"
                class="zoom btn bg-gradient-primary font-weight-bold text-light cursor mb-0 mt-2 mr-2 pl-3 pr-3 pt-2 pb-2"
                title="Escolha uma imagem para o produto. Essa opção não é obrigatória, será inserida uma imagem padrão para todos os produtos cadastrados sem imagem."
                data-toggle="tooltip" data-placement="bottom">Escolha uma imagem</label>

              <input type="submit" class="zoom btn btn-success font-weight-bold mt-2 mr-2 pl-3 pr-3 pt-2 pb-2"
                value="Adicionar" title="Adicionar o produto" />

              <input type="reset" id="reseta_modal_add_est"
                class="zoom btn btn-outline-dark font-weight-bold mt-2 pl-3 pr-3 pt-2 pb-2" value="Limpar"
                title="Limpar campos" />
            </div>

          </form>
        </section>

      </div>
    </div>
  </div>
  <!-- Fim modal -->


  <!-- Inicio modal - alterar produto -->
  <div class="modal fade" id="modalAlterar">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">

        <!-- Cabeçalho do modal-->
        <header class="modal-header bg-gradient-primary">

          <i class="far fa-question-circle cursor mt-1 text-light"
            title="Altere as informações do produto selecionado em sua tabela" data-toggle="tooltip"
            data-placement="top"></i>

          <h4 class="modal-title text-gray-100 w-100 text-center font-weight-bold">Alteração de produto</h4>
          <span id="fechar-alt-est" class="zoom text-danger cursor" data-dismiss="modal"
            title="Fechar e cancelar a alteração">
            <i class="fas fa-times text-danger"></i>
          </span>
        </header>

        <!-- Corpo do modal -->
        <section class="modal-body">

          <form action="" class="needs-validation" id="altera-estoque" novalidate>

            <!-- Para receber o id para alteração -->
            <input type="number" name="alt-id" id="id-alt-id" class="d-none" title="id" readonly />

            <!-- Nome produto -->
            <div class="input-group mb-2 w-100">
              <div class="input-group-prepend" title="Nome do produto">
                <label for="id-alt-nome-estoque" class="input-group-text font-weight-bold normalize-label-input"><span
                    class="w-100">Nome</span></label>
              </div>
              <input type="text" class="form-control normalize-input-border" name="alt-nome-estoque"
                id="id-alt-nome-estoque" placeholder="Ex: Coca-cola" title="Nome" maxlength="50"
                pattern="[^!@#$%¨&*()_+=]+" required />


              <!-- Marca produto -->
              <div class="input-group-prepend" title="Marca do produto">
                <label for="id-alt-marca-estoque"
                  class="input-group-text ml-2 font-weight-bold normalize-label-input"><span
                    class="w-100">Marca</span></label>
              </div>
              <input type="text" class="form-control normalize-input-border" name="alt-marca-estoque"
                id="id-alt-marca-estoque" placeholder="Ex: Coca-Cola" title="Marca" maxlength="50"
                pattern="[^!@#$%¨&*()_+=]+" required />
            </div>


            <div class="input-group mb-2 w-100">
              <!-- Tipo produto -->
              <div class="input-group-prepend" title="Tipo de produto">
                <label for="id-alt-tipo-estoque" class="input-group-text font-weight-bold normalize-label-input"><span
                    class="w-100">Tipo</span></label>
              </div>

              <select class="form-control normalize-input-border mr-2" name="alt-tipo-estoque" id="id-alt-tipo-estoque"
                title="Tipo" required>
                <option value="">- - -</option>
                <option value="1">Comum</option>
                <option value="2">Preparo</option>
                <option value="3">Interno</option>
              </select>


              <!-- Status produto -->
              <div class="input-group-prepend" title="Status de produto">
                <label for="id-alt-status-estoque" class="input-group-text font-weight-bold normalize-label-input"><span
                    class="w-100">Status</span></label>
              </div>

              <select class="form-control normalize-input-border" name="alt-status-estoque" id="id-alt-status-estoque"
                title="Status" required>
                <option value="">- - -</option>
                <option value="1">Ativo</option>
                <option value="2">Desativo</option>
              </select>
            </div>



            <div class="input-group mb-2 w-100">

              <!-- Quantidade produto -->
              <div class="input-group-prepend" title="Quantidade de produto">
                <label for="id-alt-quantidade-estoque"
                  class="input-group-text font-weight-bold normalize-label-input"><span class="w-100">Qtd
                    Atual</span></label>
              </div>
              <input type="number" class="form-control normalize-input-border mr-2" name="alt-quantidade-estoque"
                id="id-alt-quantidade-estoque" placeholder="Ex: 50" title="Qtd Atual" min="0" max="255" pattern="[0-9]+"
                required />

              <!-- Quantidade mínima produto -->
              <div class="input-group-prepend" title="Quantidade de produto">
                <label for="id-alt-quantidade-minima-estoque"
                  class="input-group-text font-weight-bold normalize-label-input"><span class="w-100">Qtd
                    Mín</span></label>
              </div>
              <input type="number" class="form-control" name="alt-quantidade-minima-estoque"
                id="id-alt-quantidade-minima-estoque" placeholder="Ex: 15" title="Qtd Mín" min="0" pattern="[0-9]+"
                required />
            </div>

            <div class="input-group mb-2 w-100">

              <!-- Custo produto -->
              <div class="input-group-prepend" title="Custo do produto">
                <label for="id-alt-custo-estoque" class="input-group-text font-weight-bold normalize-label-input"><span
                    class="w-100">Custo
                    R$</span></label>
              </div>
              <input type="number" step=".01" class="form-control normalize-input-border mr-2" name="alt-custo-estoque"
                id="id-alt-custo-estoque" placeholder="7.00" title="Custo" min="0" required />


              <!-- Preço produto -->
              <div class="input-group-prepend" title="Preço do produto">
                <label for="id-alt-preco-estoque" class="input-group-text font-weight-bold normalize-label-input"><span
                    class="w-100">Preço R$</span></label>
              </div>
              <input type="number" step=".01" class="form-control" name="alt-preco-estoque" id="id-alt-preco-estoque"
                placeholder="10.00" title="Preço" min="0" required />

              <input type="file" id="id-alt-imagem-estoque" name="alt-imagem-estoque" class="d-none"
                accept="image/png, image/jpeg" />

            </div>

            <div class="w-100 text-center">
              <img id="preview-image-alt-estoque" alt="Imagem do produto" />
            </div>

            <!-- Botões do formulário -->
            <div class="w-100 text-right">

              <label for="id-alt-imagem-estoque"
                class="zoom btn bg-gradient-primary font-weight-bold text-light cursor mb-0 mt-2 mr-2 pl-3 pr-3 pt-2 pb-2"
                title="Altere a imagem do produto. Essa opção não é obrigatória, portanto, em caso que já exista uma imagem salva, não será feita alteração"
                data-toggle="tooltip" data-placement="bottom">Alterar a imagem</label>

              <input type="submit" class="zoom btn btn-success font-weight-bold mt-2 mr-2 pl-3 pr-3 pt-2 pb-2"
                value="Alterar" title="Alterar o produto" />

            </div>

          </form>

        </section>

      </div>
    </div>
  </div>
  <!-- Fim modal -->


  <!-- Inicio modal - deletar produto -->
  <div class="modal fade" id="modalDeletar">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Cabeçalho do modal-->
        <header class="modal-header bg-warning">

          <i class="far fa-question-circle cursor mt-1 text-gray-900"
            title="Delete quantidade de 1 produto selecionado ou o desative-o. Em caso de multipla seleção, todos os produtos selecionados são desativados"
            data-toggle="tooltip" data-placement="top"></i>

          <h4 class="modal-title text-gray-900 w-100 text-center font-weight-bold">Atenção</h4>
        </header>

        <!-- Corpo do modal -->
        <section class="modal-body text-center">

          <form action="" class="" id="deleta-estoque">

            <span class="text-lg">
              Você está prestes a <b>excluir</b> <span id="aviso-qtd-selecionado"></span>
            </span>


            <div id="corpo-quantidade-a-deletar" class="input-group mb-2 mt-2 w-100">

              <!-- Qtd para deletar -->
              <div class="input-group-prepend" title="Menos um">
                <button id="minus-del-unid" type="button"
                  class="zoom btn btn-outline-danger input-group-text font-weight-bold normalize-label-input ml-5"><span
                    class="w-100"><i class="fas fa-minus"></i></span></button>
              </div>

              <input type="number" step=".00" class="form-control font-weight-bold text-center"
                name="quantidade_a_deletar" id="id-deletar-unid-produto" placeholder="Quantos deletar ?"
                title="Deletar Unidades" min="1" max="255" onkeydown="return false" />

              <div class="input-group-append" title="Mais um">
                <button id="plus-del-unid" type="button"
                  class="zoom btn btn-outline-success input-group-text font-weight-bold normalize-label-input mr-5 "
                  style="border-top-left-radius: 0!important;border-bottom-left-radius: 0!important;"><span
                    class="w-100"><i class="fas fa-plus"></i></span></button>
              </div>

            </div>

            <div id="corpo-check-desativar" class="custom-control custom-checkbox"
              title="Marcando e confirmando ação, o produto será desativado">
              <input type="checkbox" name="desativar_produto" id="check-desativar-estoque"
                class="custom-control-input" />
              <label class="custom-control-label cursor" for="check-desativar-estoque">Marque para desativar este
                produto</label>
            </div>

            <!-- Botões do formulário -->
            <div class="w-100 text-right">
              <input type="submit" class="zoom btn btn-success font-weight-bold mt-2 mr-2 pl-3 pr-3 pt-2 pb-2"
                value="Confirmar ação" title="Confirmar ação" />

              <input type="button" id="canc_delete"
                class="zoom btn btn-outline-danger font-weight-bold mt-2 pl-3 pr-3 pt-2 pb-2" value="Cancelar"
                title="Cancelar ação" data-dismiss="modal" />
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
  <script src="../../js/my-datatables/datatables-estoque.js"></script>
  <script src="../../js/ajax/ajax_tela_estoque.js"></script>
  <script src="../../js/ajax/ajax_global.js"></script>
  <script src="../../js/utils.js"></script>

</body>

</html>