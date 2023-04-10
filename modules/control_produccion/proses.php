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

               //Insertar detalle de control
               $materia = $_POST['materia'];
               $etapas= $_POST['etapas'];
               $observacion= $_POST['obs'];
                $insert_detalle = mysqli_query($mysqli, "INSERT INTO detalle_control (cod_control, cod_materia, cod_etapas, observacion) 
                                                        VALUES ( $codigo, $materia, $etapas, '$observacion')")
                or die('Error 22: '.mysqli_error($mysqli));

                //Insertar fallas
                 

                $fallas= $_POST['fallas'];
                $insert_detalle2 = mysqli_query($mysqli, "INSERT INTO fallas (cod_fallas, descri_fallas) 
                                                        VALUES ( $codigo, '$fallas')")
                or die('Error 22: '.mysqli_error($mysqli));
        
                //Insertar detalle fallas
                

               $materia = $_POST['materia'];
               $orden= $_POST['cod_orden'];
               $cantidad= $_POST['cantidad'];
                $insert_detalle = mysqli_query($mysqli, "INSERT INTO detalle_fallas (cod_fallas, cod_materia, cod_orden, cantidad) 
                                                        VALUES ( $codigo, $materia, $orden, $cantidad)")
                or die('Error 22: '.mysqli_error($mysqli));

                

                $descrip_produc = $_POST['descri_control'];
                $fecha = $_POST['fecha'];
                $hora = $_POST['hora'];
                $orden= $_POST['cod_orden'];
                $operario= $_POST['id_operario'];
                $estado ='activo';;
                $query = mysqli_query($mysqli, "INSERT INTO control_produccion (cod_control, descri_produc, fecha, hora, cod_orden, id_operario, estado)
                VALUES ($codigo,'$descrip_produc','$fecha', '$hora', '$orden', '$operario', '$estado')") or die('error'.mysqli_error($mysqli));
                if($query){
                    header("Location: ../../main.php?module=control_produccion&alert=1");
                }else{
                    header("Location: ../../main.php?module=control_produccion&alert=4");
                }
            }
        } 
        
        //Insertar Stock
        elseif($_GET['act']=='anular'){
            if(isset($_GET['cod_pedi'])){
                $codigo = $_GET['cod_pedi'];

                $query = mysqli_query($mysqli, "UPDATE pedidos SET estado='anulado'
                                                WHERE cod_pedi = $codigo")
                                                or die('error'.mysqli_error($mysqli));
                if($query){
                    header("Location: ../../main.php?module=pedidos&alert=3");
                }else{
                    header("Location: ../../main.php?module=pedidos&alert=4");
                }
            }
        }

        elseif ($_GET['act']=='on') {
            if (isset($_GET['cod_control'])) {
                
                $cod_control = $_GET['cod_control'];
                $cod_orden = $_GET['cod_orden'];
                $estado = "aprobado";
                $estado_ = "activo";
    
            
                $query = mysqli_query($mysqli, "UPDATE control_produccion SET estado  = '$estado'
                                                              WHERE cod_control = '$cod_control'")
                                                or die('error: '.mysqli_error($mysqli));
                $query2 = mysqli_query($mysqli, "UPDATE orden_produccion SET estado_  = '$estado_'
                                                WHERE cod_orden = '$cod_orden'")
                or die('Error : '.mysqli_error($mysqli));
    
      
                if ($query) {
                   
                    header("location: ../../main.php?module=control_produccion&alert=5");
                }
            }
        }

        elseif($_GET['act']=='anular'){
            if (isset($_GET['cod_control'])) {
                
                $cod_control = $_GET['cod_control'];
                $cod_orden = $_GET['cod_orden'];
                $estado  = "anulado";
            
                $query = mysqli_query($mysqli, "UPDATE control_produccion SET estado  = '$estado'
                                                              WHERE cod_control = '$cod_control'")
                                                or die('Error : '.mysqli_error($mysqli));
                
                $query2 = mysqli_query($mysqli, "UPDATE orden_produccion SET estado_  = '$estado'
                                                        WHERE cod_orden = '$cod_orden'")
                or die('Error : '.mysqli_error($mysqli));
    
            
                if ($query) {
                  
                    header("location: ../../main.php?module=control_produccion&alert=4");
                }
            }
        }

        $query= mysqli_query($mysqli, "SELECT * FROM detalle_orden WHERE cod_orden = $orden")
        or die('Error'.mysqli_error($mysqli));
        if($count = mysqli_num_rows($query)== 0)
        //Insertar
        $insertar_stock= mysqli_query($mysqli, "INSERT INTO detalle_orden (cod_orden, cantidad)
        VALUES ($orden, $cantidad )")
        or die('Error'.mysqli_error($mysqli));
        //actualizar stock
        $actualizar_stock= mysqli_query($mysqli, "UPDATE detalle_orden SET cantidad = cantidad - $cantidad
        WHERE cod_orden= $orden")
        or die('Error'.mysqli_error($mysqli));  
        
    }
     
?>