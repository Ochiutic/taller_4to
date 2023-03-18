<?php 

session_start();
require_once "../../config/database.php";

if(empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=alert=3'>";
}
else {
    if($_GET['act']=='insert'){
        if(isset($_POST['Guardar'])){
            $codigo = $_POST['codigo'];
            $razon = $_POST['razon'];
            $ruc = mysqli_real_escape_string($mysqli, trim($_POST['ruc']));
            $direccion = $_POST['direccion'];
            $telefono= mysqli_real_escape_string($mysqli, trim($_POST['telefono']));
            $correo = $_POST['correo'];

            $query = mysqli_query($mysqli, "INSERT INTO proveedor (prv_cod, prv_razsoc, prv_ruc,
            prv_dir,prv_tel, prv_correo)
            VALUES ($codigo, '$razon', '$ruc', '$direccion','$telefono', '$correo' )") or die(header("Location: ../../main.php?module=proveedor&alert=5"));
            
            if($query){
                header("Location: ../../main.php?module=proveedor&alert=1");
            } else {
                header("Location: ../../main.php?module=proveedor&alert=4");
            }

        }
    }
    elseif($_GET['act']=='update'){
        if(isset($_POST['Guardar'])){
            if(isset($_POST['codigo'])){
                $razon = $_POST['razon'];
                $ruc = $_POST['ruc'];
                $direccion = $_POST['direccion'];
                $telefono= $_POST['telefono'];
                $correo = $_POST['correo'];
                
                $query = mysqli_query($mysqli, "UPDATE proveedor SET nombre = '$nombre'
                                                                     apellido = '$apellido'
                                                                     ci = '$ci'
                                                                     numero_legajo = '$numero_legajo'
                                                                     cod_sector = '$sector'
                                                                    WHERE id_operario = $codigo")
                                                                    or die('Error'.mysqli_error($mysqli));

                if($query){
                header("Location: ../../main.php?module=operarios&alert=2");
                } else {
                header("Location: ../../main.php?module=operarios&alert=4");
                }                                                    
            }
        }

    }
    elseif($_GET['act']=='delete'){
        if(isset($_GET['id_operario'])){
            $codigo = $_GET['id_operario'];

            $query = mysqli_query($mysqli, "DELETE FROM operarios
                                            WHERE id_operario = $codigo")
                                            or die('Error'.mysqli_error($mysqli));
            if($query){
                header("Location: ../../main.php?module=operarios&alert=3");
            } else {
                header("Location: ../../main.php?module=operarios&alert=4");
            }
        }
    }


}

?>