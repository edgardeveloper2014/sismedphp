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

    <title>Sismed-Actualizar</title>

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
                    <li>
                        <a class="page-scroll" href="index.php">Inicio</a>
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
                    <h1>Actualizar paciente</h1>
                    <form action="PacienteActualizado.php" method="post">

            <?php
            $idpaciente = $_GET["id"];

            try {
                $db = MySQLConnection::getInstancia();
                $db->conectar();
                $rs = $db->crearResultSet("select * from paciente where p_id='" . $idpaciente . "'");

                while ($fila = $rs->getFila()) {
            ?>
                    <input type="hidden" name="var" value="<?php echo $idpaciente; ?>" />
                    <table class=" table table-condensed">
                        <tr>
                            <td><b>Primer Nombre:</b></td>
                            <td><input type="text" name="txtPnombre" value="<?php echo $fila["p_nombre1"]; ?>"/></td>
                        </tr>
                        <tr>
                            <td><b>Segundo Nombre:</b></td>
                            <td><input type="text" name="txtSnombre" value="<?php echo $fila["p_nombre2"]; ?>"/></td>
                        </tr>
                        <tr>
                            <td><b>Primer Apellido:</b></td>
                            <td><input type="text" name="txtPappellido" value="<?php echo $fila["p_apellido1"]; ?>"/></td>
                        </tr>
                        <tr>
                            <td><b>Segundo Apellido:</b></td>
                            <td><input type="text" name="txtSapellido"  value="<?php echo $fila["p_apellido2"]; ?>"/></td>
                        </tr>
                        <tr>
                            <td><b>Documento:</b></td>
                            <td><input type="text" name="txtDocumento" value="<?php echo $fila["p_documento"]; ?>"/></td>
                        </tr>
                        <tr>
                            <td><b>Direccion:</b></td>
                            <td><input type="text" name="txtDireccion" value="<?php echo $fila["p_direccion"]; ?>"/></td>
                        </tr>
                        <tr>
                            <td><b>Telefono fijo:</b></td>
                            <td><input type="text" name="txtTelefonoFijo" value="<?php echo $fila["p_tel_fijo"]; ?>"/></td>
                        </tr>
                        <tr>
                            <td><b>Telefono celular:</b></td>
                            <td><input type="text" name="txtTelefonoCelular" value="<?php echo $fila["p_tel_celular"]; ?>"/></td>
                        </tr>
                        <tr>
                            <td><b>Tipo de sangre:</b></td>
                            <td><input type="text" name="txtTipoSangre" value="<?php echo $fila["p_tipo_sangre"]; ?>"/></td>
                        </tr>
                        <tr>
                            <td><b>EPS</b></td>
                            <td>
                        <?php
                        try {
                            $db = MySQLConnection::getInstancia();
                            $db->conectar();
                            $rs = $db->crearResultSet("select  eps_id,eps_nombre from eps");
                        ?>
                            <select name="eps">
                            <?php
                            while ($arreglodatos = $rs->getFila()) {
                            ?>
                                <option value="<?php echo $arreglodatos["eps_id"]; ?>"><?php echo $arreglodatos["eps_nombre"]; ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                        <?php
                        } catch (MySQLException $ex) {
                            echo $ex->getMensajeException();
                        }
                        ?>
                    </td>
                </tr>
            </table>
            <input type="submit" value="Actualizar datos"/>
            <a href="index.php">Atras</a>
            <?php
                    }
                } catch (Exception $exc) {
                    echo $exc->getTraceAsString();
                }
            ?>
        </form>
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
