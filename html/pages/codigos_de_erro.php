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

  <title>Infinite Management - Códigos de erro</title>

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
      <a class="zoom sidebar-brand d-flex align-items-center justify-content-center" href="index.html"
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
        <a class="nav-link" href="index.html">
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

          <h1 class="h4 mt-1 mr-2 text-gray-800">Códigos de erro</h1>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Abrir tela da cozinha em uma nova aba -->
            <li class="zoom nav-item dropdown no-arrow mx-1"
              title="Visualize o que ocorre na cozinha nesse exato momento" data-toggle="tooltip"
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

          <p>Os códigos de status das respostas HTTP indicam se uma requisição HTTP foi corretamente concluída. As
            respostas são agrupadas em cinco classes: respostas de informação, respostas de sucesso, redirecionamentos,
            erros do cliente e erros do servidor.</p>

          <h2 id="Respostas_informativas">Respostas informativas</h2>

          <dl>
            <dt><a href="100" id="100"
                title="O Status HTTP 100 Continue indica que até o momento tudo está OK e que o cliente pode continuar com a requisição ou ignorar caso já tenha terminado."><code
                  class="h4 mr-2 text-gray-900">100 Continue</code></a>
            </dt>
            <dd>Essa resposta provisória indica que tudo ocorreu bem até agora e que o cliente deve continuar com a
              requisição ou ignorar se já concluiu o que gostaria.</dd>
            <dt><a href="101" id="101"
                title="O código de resposta HTTP 101 Switching Protocols indica para qual protocolo o servidor está trocando, conforme solicitado por um cliente que tenha enviado uma mensagem incluindo Upgrade no cabeçalho da requisição.
             
             O servidor inclui Upgrade no seu cabeçalho de resposta para indicar para qual protocolo o cliente foi redirecionado. O processo é descrito detalhadamente no artigo Protocol upgrade mechanism."><code
                  class="h4 mr-2 text-gray-900">101 Switching Protocol</code></a>
            </dt>
            <dd>Esse código é enviado em resposta a um cabeçalho de solicitação <a class="new"
                href="/pt-BR/docs/Web/HTTP/Headers/Upgrade" rel="nofollow"
                title="A documentação sobre isto ainda não foi escrita; por favor considere contribuir!"><code>Upgrade</code></a>
              pelo cliente, e indica o protocolo a que o servidor está alternando.</dd>
            <dt><a class="new" href="102" id="102" rel="nofollow"
                title="A documentação sobre isto ainda não foi escrita; por favor considere contribuir!"><code
                  class="h4 mr-2 text-gray-900">102 Processing</code></a>

            </dt>
            <dd>Este código indica que o servidor recebeu e está processando a requisição, mas nenhuma resposta está
              disponível ainda.</dd>
          </dl>

          <h2 id="Respostas_de_sucesso">Respostas de sucesso</h2>

          <dl>
            <dt><a href="200" id="200" title="O significado de sucesso depende do método de requisição HTTP:"><code
                  class="h4 mr-2 text-gray-900">200 OK</code></a></dt>
            <dd>Estas requisição foi bem sucedida. O significado do sucesso varia de acordo com o método HTTP:<br>
              GET: O recurso foi buscado e transmitido no corpo da mensagem.<br>
              HEAD: Os cabeçalhos da entidade estão no corpo da mensagem.<br>
              POST: O recurso descrevendo o resultado da ação e trasmitido no corpo da mensagem.<br>
              TRACE: O corpo da mensagem contem a mensagem de requisição recebida pelo servidor</dd>
            <dt><a href="201" id="201"
                title='O status HTTP "201 Created" é utilizado como resposta de sucesso, indica que a requisição foi bem sucedida e que um novo recurso foi criado. Este novo recurso é efetivamente criado antes do retorno da resposta e o novo recurso é enviado no corpo da mensagem (pode vir na URL ou na header  Location).'><code
                  class="h4 mr-2 text-gray-900">201 Created</code></a>
            </dt>
            <dd>A requisição foi bem sucessida e um novo recurso foi criado como resultado. Esta é uma tipica resposta
              enviada após uma requisição POST.</dd>
            <dt><a href="202" id="202"
                title="O código resposta HyperText Transfer Protocol (HTTP) 202 Accepted indica que a requisição foi recebida, mas não pode atuar ainda. Ela é sem compromisso, significando que não há maneira de o HTTP  enviar posteriormente uma resposta assíncrona indicando a saída do processamento da requisição. A intenção deste é para casos onde outro processo ou servidor lida com a requisição, ou para processamentos batch."><code
                  class="h4 mr-2 text-gray-900">202 Accepted</code></a>
            </dt>
            <dd>A requisição foi recebida mas nenhuma ação foi tomada sobre ela. Isto é uma requisição
              não-comprometedora, o que significa que não há nenhuma maneira no HTTP para enviar uma resposta assíncrona
              indicando o resultado do processamento da solicitação. Isto é indicado para casos onde outro processo ou
              servidor lida com a requisição, ou para processamento em lote.</dd>
            <dt><a href="203" id="203"
                title="A resposta com status HTTP 203 Non-Authoritative Information indica que a requisição foi realizada com sucesso porém o conteúdo foi modificado por um proxy da resposta com status 200 (OK) do servidor de origem."><code
                  class="h4 mr-2 text-gray-900">203 Non-Authoritative Information</code></a>
            </dt>
            <dd>Esse código de resposta significa que o conjunto de meta-informações retornadas não é o conjunto exato
              disponível no servidor de origem, mas coletado de uma cópia local ou de terceiros. Exceto essa condição, a
              resposta de 200 OK deve ser preferida em vez dessa resposta.</dd>
            <dt><a href="204" id="204"
                title="O código de resposta HTTP de status de sucesso 204 No Content indica que a solicitação foi bem sucedida e o cliente não precisa sair da página atual. Uma resposta 204 é armazenada em cache por padrão. Um cabeçalho ETag está incluso na resposta."><code
                  class="h4 mr-2 text-gray-900">204 No Content</code></a>
            </dt>
            <dd>Não há conteúdo para enviar para esta solicitação, mas os cabeçalhos podem ser úteis. O user-agent pode
              atualizar seus cabeçalhos em cache para este recurso com os novos.</dd>
            <dt><a href="205" id="205"
                title="O status code  HTTP 205 Reset Content informa ao cliente para reconfigurar a visualização do documento, para, por exemplo, limpar o conteúdo de um formulário, redefinir um estado da tela ou atualizar a interface do usuário."><code
                  class="h4 mr-2 text-gray-900">205 Reset Content</code></a>
            </dt>
            <dd>Esta requisição é enviada após realizanda a solicitação para informar ao <em>user agent</em> redefinir a
              visualização do documento que enviou essa solicitação.</dd>
            <dt><a class="new" href="206" id="206" rel="nofollow"
                title="A documentação sobre isto ainda não foi escrita; por favor considere contribuir!"><code
                  class="h4 mr-2 text-gray-900">206 Partial Content</code></a>
            </dt>
            <dd>Esta resposta é usada por causa do cabeçalho de intervalo enviado pelo cliente para separar o download
              em vários fluxos.</dd>
            <dt><a class="new" href="207" id="207" rel="nofollow"
                title="A documentação sobre isto ainda não foi escrita; por favor considere contribuir!"><code
                  class="h4 mr-2 text-gray-900">207 Multi-Status</code></a>

            </dt>
            <dd>Uma resposta Multi-Status transmite informações sobre vários recursos em situações em que vários códigos
              de status podem ser apropriados.</dd>
            <dt><a class="new" href="208" id="208" rel="nofollow"
                title="A documentação sobre isto ainda não foi escrita; por favor considere contribuir!"><code
                  class="h4 mr-2 text-gray-900">208 Multi-Status</code></a>

            </dt>
            <dd>Usado dentro de um DAV: elemento de resposta propstat para evitar enumerar os membros internos de várias
              ligações à mesma coleção repetidamente.</dd>
            <dt><a class="new" href="226" id="226" rel="nofollow"
                title="A documentação sobre isto ainda não foi escrita; por favor considere contribuir!"><code
                  class="h4 mr-2 text-gray-900">226 IM Used</code></a>
              (<a class="external" href="https://tools.ietf.org/html/rfc3229" rel="noopener">HTTP Delta encoding</a>)
            </dt>
            <dd>O servidor cumpriu uma solicitação GET para o recurso e a resposta é uma representação do resultado de
              uma ou mais manipulações de instância aplicadas à instância atual.</dd>
          </dl>

          <h2 id="Mensagens_de_redirecionamento">Mensagens de redirecionamento</h2>

          <dl>
            <dt><a class="new" href="300" id="300" rel="nofollow"
                title="A documentação sobre isto ainda não foi escrita; por favor considere contribuir!"><code
                  class="h4 mr-2 text-gray-900">300 Multiple Choice</code></a>
            </dt>
            <dd>A requisição tem mais de uma resposta possível. User-agent ou o user deve escolher uma delas. Não há
              maneira padrão para escolher uma das respostas.</dd>
            <dt><a class="new" href="301" id="301" rel="nofollow"
                title="A documentação sobre isto ainda não foi escrita; por favor considere contribuir!"><code
                  class="h4 mr-2 text-gray-900">301 Moved Permanently</code></a>
            </dt>
            <dd>Esse código de resposta significa que a URI do recurso requerido mudou. Provavelmente, a nova URI será
              especificada na resposta.</dd>
            <dt><a href="302" id="302"
                title="O código de estado HyperText Transfer Protocol (HTTP) 302 Found indica que o recurso foi temporariamente movido para a URL informada pelo cabeçalho Location. Os navegadores redirecionar para essa página porém os motores de busca não atualizam o link inicial."><code
                  class="h4 mr-2 text-gray-900">302 Found</code></a>
            </dt>
            <dd>Esse código de resposta significa que a URI do recurso requerido foi mudada temporariamente. Novas
              mudanças na URI poderão ser feitas no futuro. Portanto, a mesma URI deve ser usada pelo cliente em
              requisições futuras.</dd>
            <dt><a href="303" id="303"
                title="O código de resposta de status de redirecionamento do HyperText Transfer Protocol (HTTP) 303 See Other indica que o direcionamento não une a um recurso carregado novo, mas a outra página, com uma página de confirmação ou de progresso de carregamento. Este código de resposta normalmente é retornado como resultado de um PUT ou POST. O método usado para mostrar esta página redirecionada é sempre GET."><code
                  class="h4 mr-2 text-gray-900">303 See Other</code></a>
            </dt>
            <dd>O servidor manda essa resposta para instruir ao cliente buscar o recurso requisitado em outra URI com
              uma requisição GET.</dd>
            <dt><a href="304" id="304"
                title="O código de resposta HTTP de redirecionamento do cliente 304 Not Modified indica que não há necessidade de retransmitir a requisição de recursos. É um redirecionamento implícito para o recurso em cache. Isto ocorre quando o método de requisição é safe, assim como uma requisição GET ou HEAD, ou quando a requisição é condicional e usa um cabeçalho If-None-Match ou If-Modified-Since."><code
                  class="h4 mr-2 text-gray-900">304 Not Modified</code></a>
            </dt>
            <dd>Essa resposta é usada para questões de cache. Diz ao cliente que a resposta não foi modificada.
              Portanto, o cliente pode usar a mesma versão em cache da resposta.</dd>
            <dt><code class="h4 mr-2 text-gray-900">305 Use Proxy</code> <span class="icon-only-inline"
                title="This deprecated API should no longer be used, but will probably still work."><i
                  class="icon-thumbs-down-alt"> </i></span></dt>
            <dd>Foi definida em uma versão anterior da especificação HTTP para indicar que uma resposta deve ser
              acessada por um proxy. Foi depreciada por questões de segurança em respeito a configuração em banda de um
              proxy.</dd>
            <dt><code class="h4 mr-2 text-gray-900">306 unused </code><span class="icon-only-inline"
                title="This deprecated API should no longer be used, but will probably still work."><i
                  class="icon-thumbs-down-alt"> </i></span></dt>
            <dd>Esse código de resposta não é mais utilizado, encontra-se reservado. Foi usado numa versão anterior da
              especificação HTTP 1.1.</dd>
            <dt><a href="307" id="307"
                title="HTTP O código de estado 307 Redirecionamento temporário indica que o recurso da requisição foi temporariamente alterado para a URL informada no cabeçalho Location."><code
                  class="h4 mr-2 text-gray-900">307 Temporary Redirect</code></a>
            </dt>
            <dd>O servidor mandou essa resposta direcionando o cliente a buscar o recurso requisitado em outra URI com o
              mesmo método que foi utilizado na requisição original. Tem a mesma semântica do código
              <code>302 Found</code>, com a exceção de que o user-agent <em>não deve</em> mudar o método HTTP utilizado:
              se um <code>POST</code> foi utilizado na primeira requisição, um <code>POST</code> deve ser utilizado na
              segunda.</dd>
            <dt><a class="new" href="308" id="308" rel="nofollow"
                title="A documentação sobre isto ainda não foi escrita; por favor considere contribuir!"><code
                  class="h4 mr-2 text-gray-900">308 Permanent Redirect</code></a>
            </dt>
            <dd>Esse código significa que o recurso agora está permanentemente localizado em outra URI, especificada
              pelo cabeçalho de resposta <code>Location</code>. Tem a mesma semântica do código de resposta HTTP
              <code>301 Moved Permanently</code> com a exceção de que o user-agent <em>não deve</em> mudar o método HTTP
              utilizado: se um <code>POST</code> foi utilizado na primeira requisição, um <code>POST</code> deve ser
              utilizado na segunda.</dd>
          </dl>

          <h2 id="Respostas_de_erro_do_Cliente">Respostas de erro do Cliente</h2>

          <dl>
            <dt><a href="400" id="400"
                title="O código de status de resposta HTTP 400 Bad Request indica que o servidor não pode ou não irá processar a requisição devido a alguma coisa que foi entendida como um erro do cliente (por exemplo, sintaxe de requisição mal formada, enquadramento de mensagem de requisição inválida ou requisição de roteamento enganosa)."><code
                  class="h4 mr-2 text-gray-900">400 Bad Request</code></a>
            </dt>
            <dd>Essa resposta significa que o servidor não entendeu a requisição pois está com uma sintaxe inválida.
            </dd>
            <dt><a href="401" id="401"
                title="O código de resposta de status de erro do cliente HTTP 401 Unauthorized  indica que a solicitação não foi aplicada porque não possui credenciais de autenticação válidas para o recurso de destino."><code
                  class="h4 mr-2 text-gray-900">401 Unauthorized</code></a>
            </dt>
            <dd>Embora o padrão HTTP especifique "unauthorized", semanticamente, essa resposta significa
              "unauthenticated". Ou seja, o cliente deve se autenticar para obter a resposta solicitada.</dd>
            <dt><code class="h4 mr-2 text-gray-900">402 Payment Required</code></dt>
            <dd>Este código de resposta está reservado para uso futuro. O objetivo inicial da criação deste código era
              usá-lo para sistemas digitais de pagamento porém ele não está sendo usado atualmente.</dd>
            <dt><a href="403" id="403"
                title="O código de resposta de status de erro do cliente HTTP 403 Forbidden indica que o servidor entendeu o pedido, mas se recusa a autorizá-lo."><code
                  class="h4 mr-2 text-gray-900">403 Forbidden</code></a>
            </dt>
            <dd>O cliente não tem direitos de acesso ao conteúdo portanto o servidor está rejeitando dar a resposta.
              Diferente do código 401, aqui a identidade do cliente é conhecida.</dd>
            <dt><a href="404" id="404"
                title="A resposta de erro 404 Not Found indica que o servidor não conseguiu encontrar o recurso solicitado. Normalmente, links que levam para uma página 404 estão quebrados ou desativados, e podem estar sujeitos a link rot."><code
                  class="h4 mr-2 text-gray-900">404 Not Found</code></a>
            </dt>
            <dd>O servidor não pode encontrar o recurso solicitado. Este código de resposta talvez seja o mais famoso
              devido à frequência com que acontece na web.</dd>
            <dt><a href="405" id="405"
                title="A documentação sobre isto ainda não foi escrita; por favor considere contribuir!"><code
                  class="h4 mr-2 text-gray-900">405 Method Not Allowed</code></a>
            </dt>
            <dd>O método de solicitação é conhecido pelo servidor, mas foi desativado e não pode ser usado. Os dois
              métodos obrigatórios, GET e HEAD, nunca devem ser desabilitados e não devem retornar este código de erro.
            </dd>
            <dt><a class="new" href="406" id="406" rel="nofollow"
                title="A documentação sobre isto ainda não foi escrita; por favor considere contribuir!"><code
                  class="h4 mr-2 text-gray-900">406 Not Acceptable</code></a>
            </dt>
            <dd>Essa resposta é enviada quando o servidor da Web após realizar a negociação de conteúdo orientada pelo
              servidor, não encontra nenhum conteúdo seguindo os critérios fornecidos pelo agente do usuário.</dd>
            <dt><a href="407" id="407"
                title="A documentação sobre isto ainda não foi escrita; por favor considere contribuir!"><code
                  class="h4 mr-2 text-gray-900">407 Proxy Authentication Required</code></a>
            </dt>
            <dd>Semelhante ao <strong>401 </strong>porem é necessário que a autenticação seja feita por um proxy.</dd>
            <dt><a href="408" id="408"
                title="A resposta 408 Request Timeout significa que o servidor irá encerrar essa conexão em desuso. É enviado a uma conexão parada por alguns servidores, mesmo sem nenhuma requisição feita anteriormente pelo cliente."><code
                  class="h4 mr-2 text-gray-900">408 Request Timeout</code></a>
            </dt>
            <dd>Esta resposta é enviada por alguns servidores em uma conexão ociosa, mesmo sem qualquer requisição
              prévia pelo cliente. Ela significa que o servidor gostaria de derrubar esta conexão em desuso. Esta
              resposta é muito usada já que alguns navegadores, como Chrome, Firefox 27+, ou IE9, usam mecanismos HTTP
              de pré-conexão para acelerar a navegação. Note também que alguns servidores meramente derrubam a conexão
              sem enviar esta mensagem.</dd>
            <dt><a href="409" id="409"
                title="O status de resposta 409 Conflict indica que a solicitação atual conflitou com o recurso que está no servidor."><code
                  class="h4 mr-2 text-gray-900">409 Conflict</code></a>
            </dt>
            <dd>Esta resposta será enviada quando uma requisição conflitar com o estado corrente do servidor.</dd>
            <dt><a href="410" id="410"
                title="O código de resposta HTTP 410 Gone de erro do cliente indica que o acesso ao recurso não está mais disponível no servidor de origem, e que esta condição tende a ser permanente."><code
                  class="h4 mr-2 text-gray-900">410 Gone</code></a>
            </dt>
            <dd>Esta resposta será enviada quando o conteúdo requisitado foi deletado do servidor.</dd>
            <dt><a href="411" id="411"
                title="O código de resposta 411 Length Required de erro de cliente do Protocolo de Transferência de HyperTexto (HTTP) indica que o servidor se nega a aceitar a requisição sem um cabeçalho Content-Length definido."><code
                  class="h4 mr-2 text-gray-900">411 Length Required</code></a>
            </dt>
            <dd>O servidor rejeitou a requisição porque o campo <code>Content-Length</code> do cabeçalho não está
              definido e o servidor o requer.</dd>
            <dt><a class="new" href="412" id="412" rel="nofollow"
                title="A documentação sobre isto ainda não foi escrita; por favor considere contribuir!"><code
                  class="h4 mr-2 text-gray-900">412 Precondition Failed</code></a>
            </dt>
            <dd>O cliente indicou nos seus cabeçalhos pré-condições que o servidor não atende.</dd>
            <dt><a href="413" id="413"
                title="O código de resposta HTTP 413 Payload Too Large indica que a carga da requisição é mais larga que os limites estabelecidos pelo servidor; o servidor pode encerrar a conexão ou retornar Retry-After no campo de cabeçalho."><code
                  class="h4 mr-2 text-gray-900">413 Payload Too Large</code></a>
            </dt>
            <dd>A entidade requisição é maior do que os limites definidos pelo servidor; o servidor pode fechar a
              conexão ou retornar um campo de cabeçalho <code>Retry-After</code>.</dd>
            <dt><a href="414" id="414"
                title="O código de resposta 414 URI Too Long indica que o tamanho da URI requisitada pelo cliente é maior do que o tamanho que o servidor aceita interpretar."><code
                  class="h4 mr-2 text-gray-900">414 URI Too Long</code></a>
            </dt>
            <dd>A URI requisitada pelo cliente é maior do que o servidor aceita para interpretar.</dd>
            <dt><a href="415" id="415"
                title="A documentação sobre isto ainda não foi escrita; por favor considere contribuir!"><code
                  class="h4 mr-2 text-gray-900">415 Unsupported Media Type</code></a>
            </dt>
            <dd>O formato de mídia dos dados requisitados não é suportado pelo servidor, então o servidor rejeita a
              requisição.</dd>
            <dt><a class="new" href="416" id="416" rel="nofollow"
                title="A documentação sobre isto ainda não foi escrita; por favor considere contribuir!"><code
                  class="h4 mr-2 text-gray-900">416 Requested Range Not Satisfiable</code></a>
            </dt>
            <dd>O trecho especificado pelo campo <code>Range</code> do cabeçalho na requisição não pode ser preenchido;
              é possível que o trecho esteja fora do tamanho dos dados da URI alvo.</dd>
            <dt><a href="417" id="417"
                title="O codigo de erro de cliente HTTP 417 Expectation Failed indica que a expectativa enviada no cabeçalho da requisição Expect não foi suprida."><code
                  class="h4 mr-2 text-gray-900">417 Expectation Failed</code></a>
            </dt>
            <dd>Este código de resposta significa que a expectativa indicada pelo campo <code>Expect</code> do cabeçalho
              da requisição não pode ser satisfeita pelo servidor.</dd>
            <dt><a href="418" id="418"
                title="O código de erro HTTP para o cliente 418 I'm a teapot indica que o servidor se recusa a preparar café por ser um bule de chá. Este erro é uma referência ao Hyper Text Coffee Pot Control Protocol, que foi uma piada de 1º de abril de 1998."><code
                  class="h4 mr-2 text-gray-900">418 I'm a teapot</code></a>
            </dt>
            <dd>O servidor recusa a tentativa de coar café num bule de chá.</dd>
            <dt><a class="new" href="421" id="421" rel="nofollow"
                title="A documentação sobre isto ainda não foi escrita; por favor considere contribuir!"><code
                  class="h4 mr-2 text-gray-900">421 Misdirected Request</code></a>
            </dt>
            <dd>A requisição foi direcionada a um servidor inapto a produzir a resposta. Pode ser enviado por um
              servidor que não está configurado para produzir respostas para a combinação de esquema ("scheme") e
              autoridade inclusas na URI da requisição.</dd>
            <dt><a href="422" id="422"
                title="O codigo de resposta HTTP 422 Unprocessable Entity indica que o servidor entende o tipo de conteúdo da entidade da requisição, e a sintaxe da requisição esta correta, mas não foi possível processar as instruções presentes."><code
                  class="h4 mr-2 text-gray-900">422 Unprocessable Entity</code></a>

            </dt>
            <dd>A requisição está bem formada mas inabilitada para ser seguida devido a erros semânticos.</dd>
            <dt><a class="new" href="423" id="423" rel="nofollow"
                title="A documentação sobre isto ainda não foi escrita; por favor considere contribuir!"><code
                  class="h4 mr-2 text-gray-900">423 Locked</code></a>

            </dt>
            <dd>O recurso sendo acessado está ado.</dd>
            <dt><a class="new" href="424" id="424" rel="nofollow"
                title="A documentação sobre isto ainda não foi escrita; por favor considere contribuir!"><code
                  class="h4 mr-2 text-gray-900">424 Failed Dependency</code></a>

            </dt>
            <dd>A requisição falhou devido a falha em requisição prévia.</dd>
            <dt><a href="426" id="426"
                title="O status HTTP 426 Upgrade Required indica que o servidor recusa o processamento da requisição usando o protocolo atual mas poderá ser processado caso o cliente atualize para um protocolo diferente."><code
                  class="h4 mr-2 text-gray-900">426 Upgrade Required</code></a>
            </dt>
            <dd>O servidor se recusa a executar a requisição usando o protocolo corrente mas estará pronto a fazê-lo
              após o cliente atualizar para um protocolo diferente. O servidor envia um cabeçalho <a class="new"
                href="/pt-BR/docs/Web/HTTP/Headers/Upgrade" rel="nofollow"
                title="A documentação sobre isto ainda não foi escrita; por favor considere contribuir!"><code>Upgrade</code></a>
              numa resposta 426 para indicar o(s) protocolo(s) requeridos.</dd>
            <dt><a href="428" id="428"
                title="O codigo de resposta HTTP 428 Precondition Required indica que o servidor precisa que a requisição seja condicional."><code
                  class="h4 mr-2 text-gray-900">428 Precondition Required</code></a>
            </dt>
            <dd>O servidor de origem requer que a resposta seja condicional. Feito para prevenir o problema da
              'atualização perdida', onde um cliente pega o estado de um recurso (GET) , modifica-o, e o põe de volta no
              servidor (PUT), enquanto um terceiro modificou o estado no servidor, levando a um conflito.</dd>
            <dt><a href="429" id="429"
                title="O código de resposta HTTP 429 Too Many Requests indica que o usuário enviou muitos pedidos em um determinado período de tempo."><code
                  class="h4 mr-2 text-gray-900">429 Too Many Requests</code></a>
            </dt>
            <dd>O usuário enviou muitas requisições num dado tempo ("limitação de frequência").</dd>
            <dt><a class="new" href="431" id="431" rel="nofollow"
                title="A documentação sobre isto ainda não foi escrita; por favor considere contribuir!"><code
                  class="h4 mr-2 text-gray-900">431 Request Header Fields Too Large</code></a>
            </dt>
            <dd>O servidor não quer processar a requisição porque os campos de cabeçalho são muito grandes. A requisição
              PODE ser resubmetida depois de reduzir o tamanho dos campos de cabeçalho.</dd>
            <dt><a href="451" id="451"
                title="O código de erro HTTP para o cliente 451 Unavailable For Legal Reasons indica que o recurso solicitado pelo usuário não está disponível por motivos legais, como em uma página web para a qual foi emitida uma ação legal."><code
                  class="h4 mr-2 text-gray-900">451 Unavailable For Legal Reasons</code></a>
            </dt>
            <dd>O usuário requisitou um recurso ilegal, tal como uma página censurada por um governo.</dd>
          </dl>

          <h2 id="Respostas_de_erro_do_Servidor">Respostas de erro do Servidor</h2>

          <dl>
            <dt><a href="500" id="500"
                title='Quando o servidor retorna um código de erro (HTTP) 500, indica que  encontrou uma condição inesperada e que o impediu de atender à solicitação.
             
             Essa resposta de erro é uma resposta genérica "abrangente". Às vezes, os arquivos log de servidores podem responder com um status code 500 acompanhado de mais detalhes sobre o request para evitar que no futuro erros desse tipo possam voltar a acontecer.'><code
                  class="h4 mr-2 text-gray-900">500 Internal Server Error</code></a>
            </dt>
            <dd>O servidor encontrou uma situação com a qual não sabe lidar.</dd>
            <dt><a href="501" id="501"
                title="O código de resposta HTTP 501 Not Implemented indica que o servidor não suporta a funcionalidade requerida para completar a requisição. Esta é a resposta apropriada para quando o servidor não reconhece o método requisitado e não tem capacidade de suporta-lo  para nenhum recurso. Os únicos métodos de requisição que os servidores suportam obrigatóriamente ( e, portanto, isso não deve retornar este código) são GET e HEAD."><code
                  class="h4 mr-2 text-gray-900">501 Not Implemented</code></a>
            </dt>
            <dd>O método da requisição não é suportado pelo servidor e não pode ser manipulado. Os únicos métodos
              exigidos que servidores suportem (e portanto não devem retornar este código) são <code>GET</code> e
              <code>HEAD</code>.</dd>
            <dt><a href="502" id="502"
                title="O código de erro HTTP 502 Bad Gateway retornado pelo servidor indica que ele, enquanto atuando como um servidor intermediário (gateway ou proxy), recebeu uma resposta inválida do servidor para o qual a requisição foi encaminhada (upstream server)."><code
                  class="h4 mr-2 text-gray-900">502 Bad Gateway</code></a>
            </dt>
            <dd>Esta resposta de erro significa que o servidor, ao trabalhar como um gateway a fim de obter uma resposta
              necessária para manipular a requisição, obteve uma resposta inválida.</dd>
            <dt><a href="503" id="503"
                title="O código de resposta de erro de servidor 503 Service Unavailable do HTTP indica que o servidor não está pronto para lidar com a requisição."><code
                  class="h4 mr-2 text-gray-900">503 Service Unavailable</code></a>
            </dt>
            <dd>O servidor não está pronto para manipular a requisição. Causas comuns são um servidor em manutenção ou
              sobrecarregado. Note que junto a esta resposta, uma página amigável explicando o problema deveria ser
              enviada. Estas respostas devem ser usadas para condições temporárias e o cabeçalho HTTP
              <code>Retry-After:</code> deverá, se posível, conter o tempo estimado para recuperação do serviço. O
              webmaster deve também tomar cuidado com os cabaçalhos relacionados com o cache que são enviados com esta
              resposta, já que estas respostas de condições temporárias normalmente não deveriam ser postas em cache.
            </dd>
            <dt><a href="504" id="504"
                title="O código de resposta de erro HTTP 504 Gateway Timeout indica que o servidor, enquanto atuando como gateway ou proxy, não conseguiu responder em tempo."><code
                  class="h4 mr-2 text-gray-900">504 Gateway Timeout</code></a>
            </dt>
            <dd>Esta resposta de erro é dada quando o servidor está atuando como um gateway e não obtém uma resposta à
              tempo.</dd>
            <dt><a href="505" id="505"
                title="O código de resposta de status HTTP 505 HTTP Version Not Supported indica que a versão HTTP utilizada na requisição não é suportada pelo servidor."><code
                  class="h4 mr-2 text-gray-900">505 HTTP Version Not Supported</code></a>
            </dt>
            <dd>A versão HTTP usada na requisição não é suportada pelo servidor.</dd>
            <dt><a class="new" href="506" id="506" rel="nofollow"
                title="A documentação sobre isto ainda não foi escrita; por favor considere contribuir!"><code
                  class="h4 mr-2 text-gray-900">506 Variant Also Negotiates</code></a>
            </dt>
            <dd>O servidor tem um erro de configuração interno: a negociação transparente de conteúdo para a requisição
              resulta em uma referência circular.</dd>
            <dt><a class="new" href="507" id="507" rel="nofollow"
                title="A documentação sobre isto ainda não foi escrita; por favor considere contribuir!"><code
                  class="h4 mr-2 text-gray-900">507 Insufficient Storage</code></a>
            </dt>
            <dd>O servidor tem um erro interno de configuração: o recurso variante escolhido está configurado para
              entrar em negociação transparente de conteúdo com ele mesmo, e portanto não é uma ponta válida no processo
              de negociação.</dd>
            <dt><a href="508" id="508"
                title="O código de resposta de erro HTTP  508 Loop Detected pode ser retornado em um contexto do protocolo Web Distributed Authoring and Versioning (WebDAV) ."><code
                  class="h4 mr-2 text-gray-900">508 Loop Detected</code></a>

            </dt>
            <dd>O servidor detectou um looping infinito ao processar a requisição.</dd>
            <dt><a class="new" href="510" id="510" rel="nofollow"
                title="A documentação sobre isto ainda não foi escrita; por favor considere contribuir!"><code
                  class="h4 mr-2 text-gray-900">510 Not Extended</code></a>
            </dt>
            <dd>Exigem-se extenções posteriores à requisição para o servidor atendê-la.</dd>
            <dt><a class="new" href="511" id="511" rel="nofollow"
                title="A documentação sobre isto ainda não foi escrita; por favor considere contribuir!"><code
                  class="h4 mr-2 text-gray-900">511 Network Authentication Required</code></a>
            </dt>
            <dd>O código de status 511 indica que o cliente precisa se autenticar para ganhar acesso à rede.</dd>
          </dl>

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
          <a class="zoom btn btn-primary" href="../../index.html">Sair</a>
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