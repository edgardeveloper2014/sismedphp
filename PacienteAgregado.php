<?php

include_once 'Modelos/NativasMySQL/MySQLConnection.php';
?>
<?php

try {
    $idpaciente = $_POST["var"];
    $db = MySQLConnection::getInstancia();
    $db->conectar();
    $a = $db->crearResultSet("Insert into paciente(p_nombre1,p_apellido1,p_nombre2,p_apellido2,p_documento,p_tipodocumento,p_direccion,p_tel_fijo,p_tel_celular,p_tipo_sangre,eps_eps_id) values('".$_POST["txtPnombre"]."','".$_POST["txtPapellido"]."','".$_POST["txtSnombre"]."','".$_POST["txtSapellido"]."','".$_POST["txtDocumento"]."','".$_POST["Documento"]."','".$_POST["txtDireccion"]."','".$_POST["txtTelefonoFijo"]."','".$_POST["txtTelefonoCelular"]."','".$_POST["TipoSangre"]."','".$_POST["eps"]."')");
    header("Location: index.php");
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}

?>
