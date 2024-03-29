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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cozinha - Infinite Management</title>

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

<body>

    <div class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <!-- Cabeçalho -->
        <h1 class="h4 mt-1 ml-auto mr-auto text-gray-800">Cozinha</h1>
    </div>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 col-sm-12 col-md-5 col-lg-5 mb-4">
                <div class="card-header py-3 bg-gradient-primary text-gray-100 d-flex align-items-center">
                    <h6 id="caracteristica_pedido" class="m-0 mr-auto ml-auto">
                        <!-- Características do pedido aqui -->
                    </h6>
                </div>
                
                <div id="pedido_principal" class="card shadow rounded my-h my-h-sm my-h-md border-0" style="height: 76.9vh;">
                    <!-- Imagem e botão do pedido principal aqui -->
                </div>
            </div>


            <div class="col-12 col-sm-12 col-md-7 col-lg-7 mb-4">
                <div class="card shadow my-h my-h-sm my-h-md">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-gray-800 ml-auto mr-auto">Pedidos em espera</h6>
                    </div>

                    <div class="p-3">
                        <div class="overflow-auto" style="height: 72vh;">
                            <div class="w-100">
                                <div class="lista-de-pedidos-em-espera" class="mb-1">

                                    <!-- LISTAGEM DOS PRODUTOS EM PREPARO AQUI -->

                                    <div class="d-flex align-items-center">
                                        <div class="ml-auto mr-auto text-xs">
                                            <span class="font-weight-bold w-25">Nenhum pedido em espera</span>
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

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../vendor/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/ajax/ajax.notify.js"></script>
    <script src="../../js/ajax/ajax_tela_cozinha.js"></script>

</body>

</html>