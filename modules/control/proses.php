<?php 
    session_start();
    require_once "../../config/database.php";

    if(empty($_SESSION['username']) && empty($_SESSION['password'])){
        echo "<meta http-equiv='refresh' content='0; url=index.php?alert=alert=3'>";
    }
    else{
        if($_GET['act']=='insert'){
            if(isset($_POST['Guardar'])){
                                    $codigo = $_POST['codigo'];
                                    $descri_calidad = $_POST['descri_calidad'];
                                    $cod_orden = $_POST['cod_orden'];
                                    $id_operario = $_POST['id_operario'];
                                    $fecha = $_POST['fecha'];
                                    $hora = $_POST['hora'];
                                    $estado ='aprobado';
                $query = mysqli_query($mysqli, "INSERT INTO control_calidad (cod_calidad, descri_calidad, fecha, hora, cod_orden,id_operario, estado)
                VALUES ($codigo,'$descri_calidad','$fecha', '$hora', '$cod_orden','$id_operario','$estado' )") or die('error'.mysqli_error($mysqli));
                if($query){
                    header("Location: ../../main.php?module=control&alert=1");
                }else{
                    header("Location: ../../main.php?module=control&alert=4");
                }
            }
        } 
       
        /*elseif($_GET['act']=='anular'){
            if(isset($_GET['cod_calidad'])){
                $codigo = $_GET['cod_calidad'];

                $query = mysqli_query($mysqli, "UPDATE control_calidad SET estado='anulado'
                                                WHERE cod_calidad = $codigo")
                                                or die('error'.mysqli_error($mysqli));
                if($query){
                    header("Location: ../../main.php?module=control&alert=3");
                }else{
                    header("Location: ../../main.php?module=control&alert=4");
                }
            }
        }*/

        elseif ($_GET['act']=='on') {
            if (isset($_GET['cod_calidad'])) {
                
                $cod_calidad = $_GET['cod_calidad'];
                $cod_orden = $_GET['cod_orden'];
                $estado = "aprobado";
                $estado_ = "activo";
    
            
                $query = mysqli_query($mysqli, "UPDATE control_calidad SET estado  = '$estado'
                                                              WHERE cod_calidad = '$cod_calidad'")
                                                or die('error: '.mysqli_error($mysqli));
                $query2 = mysqli_query($mysqli, "UPDATE orden_produccion SET estado_  = '$estado_'
                                                WHERE cod_orden = '$cod_orden'")
                or die('Error : '.mysqli_error($mysqli));
    
      
                if ($query) {
                   
                    header("location: ../../main.php?module=control&alert=5");
                }
            }
        }
    
    
        elseif($_GET['act']=='anular'){
            if (isset($_GET['cod_calidad'])) {
                
                $cod_calidad = $_GET['cod_calidad'];
                $cod_orden = $_GET['cod_orden'];
                $estado  = "anulado";
            
                $query = mysqli_query($mysqli, "UPDATE control_calidad SET estado  = '$estado'
                                                              WHERE cod_calidad = '$cod_calidad'")
                                                or die('Error : '.mysqli_error($mysqli));
                
                $query2 = mysqli_query($mysqli, "UPDATE orden_produccion SET estado_  = '$estado'
                                                        WHERE cod_orden = '$cod_orden'")
                or die('Error : '.mysqli_error($mysqli));
    
            
                if ($query) {
                  
                    header("location: ../../main.php?module=control&alert=4");
                }
            }
        }
    }
?>