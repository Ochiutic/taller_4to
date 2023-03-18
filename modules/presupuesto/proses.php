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
                $pedidos_cli = $_POST['pedidos_cli'];
                $precio=$_POST['precio'];
                $insert_detalle = mysqli_query($mysqli, "INSERT INTO detalle_presupuesto(cod_presu, cod_pedi,precio) 
                                                        VALUES ( $codigo, $pedidos_cli, $precio)")
                or die('Error 22: '.mysqli_error($mysqli));



                $descri_presu = $_POST['descri_presu'];
                $fecha = $_POST['fecha'];
                $hora = $_POST['hora'];
                $estado ='aprobado';
                $query = mysqli_query($mysqli, "INSERT INTO presupuesto (cod_presu, descri_presu, fecha, hora, estado)
                VALUES ($codigo,'$descri_presu','$fecha', '$hora','$estado' )") or die('error'.mysqli_error($mysqli));
                if($query){
                    header("Location: ../../main.php?module=presupuesto&alert=1");
                }else{
                    header("Location: ../../main.php?module=presupuesto&alert=4");
                }
            }
        } 
        elseif($_GET['act']=='update'){
            if(isset($_POST['Guardar'])){
                if(isset($_POST['codigo'])){
                    $cod = $_POST['cod_presu'];
                $descri_presu = $_POST['descri_presu'];
                $cod_pedi = $_POST['cod_pedi'];
                $fecha = $_POST['fecha'];
                $hora = $_POST['hora'];
                $estado ='aprobado';
                    $query = mysqli_query($mysqli, "UPDATE presupuesto SET descri_presu = '$descri_presu',
                                                                           cod_pedi = '$cod_pedi' 
                                                                            fecha =$fecha
                                                                            hora = $hora
                                                                        WHERE cod_presu = $codigo")
                                                                        or die('error 29: '.mysqli_error($mysqli));
                    if($query){
                        header("Location: ../../main.php?module=presupuesto&alert=2");
                    }else{
                        header("Location: ../../main.php?module=presupuesto&alert=4");
                    }
                }
            }
        }
     /*   elseif($_GET['act']=='anular'){
            if(isset($_GET['cod_presu'])){
                $codigo = $_GET['cod_presu'];

                $query = mysqli_query($mysqli, "UPDATE presupuesto SET estado='anulado'
                                                WHERE cod_presu = $codigo")
                                                or die('error'.mysqli_error($mysqli));
                if($query){
                    header("Location: ../../main.php?module=presupuesto&alert=3");
                }else{
                    header("Location: ../../main.php?module=presupuesto&alert=4");
                }
            }
        }*/

        elseif ($_GET['act']=='on') {
            if (isset($_GET['cod_presu'])) {
                
                $cod_presu = $_GET['cod_presu'];
                $cod_pedi = $_GET['cod_pedi'];
                $estado = "aprobado";
                $estado = "activo";
    
            
                $query = mysqli_query($mysqli, "UPDATE presupuesto SET estado  = '$estado'
                                                             WHERE cod_presu = '$cod_presu'")
                                                or die('error: '.mysqli_error($mysqli));
                $query2 = mysqli_query($mysqli, "UPDATE pedidos SET estado  = '$estado'
                                                WHERE cod_pedi = '$cod_pedi'")
                or die('Error : '.mysqli_error($mysqli));
    
      
                if ($query) {
                   
                    header("location: ../../main.php?module=presupuesto&alert=5");
                }
            }
        }
    
    
        elseif($_GET['act']=='anular'){
            if (isset($_GET['cod_presu'])) {
                
                $cod_presu = $_GET['cod_presu'];
                $cod_pedi = $_GET['cod_pedi'];
                $estado  = "anulado";
            
                $query = mysqli_query($mysqli, "UPDATE presupuesto SET estado  = '$estado'
                                                                 WHERE cod_presu = '$cod_presu'")
                                                or die('Error : '.mysqli_error($mysqli));
                
                $query2 = mysqli_query($mysqli, "UPDATE pedidos SET estado  = '$estado'
                                                        WHERE cod_pedi = '$cod_pedi'")
                or die('Error : '.mysqli_error($mysqli));
    
            
                if ($query) {
                  
                    header("location: ../../main.php?module=presupuesto&alert=4");
                }
            }
        }
    }
?>