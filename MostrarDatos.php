<?php
    include_once 'Modelos/NativasMySQL/MySQLConnection.php';
    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sismed-Consultar</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/scrolling-nav.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
     <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                   
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Sismed</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="AgregarPaciente.php">Agregar Paciente</a>
                    </li>
                    
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                  <h1>Usuarios Eps</h1>
        <?php
        $db = MySQLConnection::getInstancia();
        $db->conectar();
        $SeleccionEPS = $db->crearResultSet("select p_documento,p_nombre1,p_nombre2,p_apellido1,p_apellido2,p_id from paciente where eps_eps_id='" . $_REQUEST['eps'] . "'");
        echo "<table class='table table-bordered'><tr><td align='center'><b>Documento</b></td><td align='center'><b>Nombres</b></td><td align='center'><b>Apellidos</b></td><td align='center'><b>Actualizar</b></td></tr>";
        ?>
        <?php
            
            while ($arreglo = $SeleccionEPS->getFila()) {
            ?>
        <tr><td class="success"><?php echo $arreglo["p_documento"]; ?></td><td><?php echo $arreglo["p_nombre1"] . " " . $arreglo["p_nombre2"]; ?></td><td><?php echo $arreglo["p_apellido1"] . " " . $arreglo["p_apellido2"]; ?></td><td><a href="Actualizar.php?id=<?php echo $arreglo["p_id"]; ?>">Actualizar</a></td></tr>
            <?php
            }
            echo "</table>";
        ?>   
                </div>
            </div>
        </div>
    </section>

   
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>

</body>

</html>
