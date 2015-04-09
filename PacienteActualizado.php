<?php

include_once 'Modelos/NativasMySQL/MySQLConnection.php';
?>
<?php

try {
    $idpaciente = $_POST["var"];
    $db = MySQLConnection::getInstancia();
    $db->conectar();
    $a = $db->crearResultSet("Update paciente set p_nombre1 ='" . $_POST["txtPnombre"] . "', p_apellido1 ='" . $_POST["txtPappellido"] . "', p_nombre2 ='" . $_POST["txtSnombre"] . "', p_apellido2 ='" . $_POST["txtSapellido"] . "', p_documento ='" . $_POST["txtDocumento"] . "', p_direccion ='" . $_POST["txtDireccion"] . "', p_tel_fijo ='" . $_POST["txtTelefonoFijo"] . "', p_tel_celular ='" . $_POST["txtTelefonoCelular"] . "', p_tipo_sangre ='" . $_POST["txtTipoSangre"] . "', eps_eps_id ='" . $_POST["eps"] . "' where p_id ='" . $idpaciente . "'");
    header("Location: index.php");
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}

?>
