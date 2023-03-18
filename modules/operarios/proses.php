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
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $ci = mysqli_real_escape_string($mysqli, trim($_POST['ci']));
            $numero_legajo= mysqli_real_escape_string($mysqli, trim($_POST['numero_legajo']));
            $sector = $_POST['cod_sector'];

            $query = mysqli_query($mysqli, "INSERT INTO operarios (id_operario, nombre, apellido,
            ci,numero_legajo, cod_sector)
            VALUES ($codigo, '$nombre', '$apellido', '$ci','$numero_legajo', '$sector' )") or die(header("Location: ../../main.php?module=operarios&alert=5"));
            
            if($query){
                header("Location: ../../main.php?module=operarios&alert=1");
            } else {
                header("Location: ../../main.php?module=operarios&alert=4");
            }

        }
    }
    elseif($_GET['act']=='update'){
        if(isset($_POST['Guardar'])){
            if(isset($_POST['codigo'])){
                $codigo = $_POST['codigo'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $ci = $_POST['ci'];
                $numero_legajo = $_POST['numero_legajo'];
                $sector = $_POST['cod_sector'];
                
                $query = mysqli_query($mysqli, "UPDATE operarios SET nombre = '$nombre'
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