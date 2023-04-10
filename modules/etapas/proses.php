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
            $descrip = $_POST['descrip'];
        

            $query = mysqli_query($mysqli, "INSERT INTO etapas (cod_etapas, descri_etapas)
            VALUES ($codigo, '$descrip' )") or die(header("Location: ../../main.php?module=etapas&alert=5"));
            
            if($query){
                header("Location: ../../main.php?module=etapas&alert=1");
            } else {
                header("Location: ../../main.php?module=etapas&alert=4");
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
        if(isset($_GET['cod_etapas'])){
            $codigo = $_GET['cod_etapas'];

            $query = mysqli_query($mysqli, "DELETE FROM etapas
                                            WHERE cod_etapas = $codigo")
                                            or die('Error'.mysqli_error($mysqli));
            if($query){
                header("Location: ../../main.php?module=etapas&alert=3");
            } else {
                header("Location: ../../main.php?module=etapas&alert=4");
            }
        }
    }


}

?>