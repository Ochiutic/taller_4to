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

                $cliente = $_POST['cliente'];
                $proveedor = $_POST['proveedor'];
                $precio=$_POST['presu'];
                $insert_detalle = mysqli_query($mysqli, "INSERT INTO detalle_orden_com(ord_cod, cod_razon, prv_cod, presu_cod) 
                                                        VALUES ( $codigo, $cliente,$proveedor, $precio)")
                or die('Error 22: '.mysqli_error($mysqli));





                
                $orden = $_POST['orden'];
                $fecha = $_POST['fecha'];
                $presu = $_POST['presu_prove'];
                $name_user = $_POST['usuario'];    
                $estado ='activo';
                $query = mysqli_query($mysqli, "INSERT INTO orden_compra (ord_cod, ord_descrip, ord_fecha, presu_cod, id_user, estado)
                VALUES ($codigo,'$orden','$fecha','$presu', '$name_user','$estado')") or die('error'.mysqli_error($mysqli));
                if($query){
                    header("Location: ../../main.php?module=orden_compra&alert=1");
                }else{
                    header("Location: ../../main.php?module=orden_compra&alert=4");
                }
            }
        } 
        elseif($_GET['act']=='update'){
            if(isset($_POST['Guardar'])){
                if(isset($_POST['codigo'])){
                    $descri_pedi = $_POST['descri_pedi'];
                    $fecha = $_POST['fecha'];
                    $hora = $_POST['hora'];
                    $cod_razon = $_POST['cod_razon'];
                    $estado='activo';
                    $query = mysqli_query($mysqli, "UPDATE pedidos SET descri_pedi = '$descri_pedi',
                                                                            fecha =$fecha
                                                                            hora = $hora
                                                                            cod_razon = $cod_razon
                                                                        WHERE cod_pedi = $codigo")
                                                                        or die('error 29: '.mysqli_error($mysqli));
                    if($query){
                        header("Location: ../../main.php?module=pedidos&alert=2");
                    }else{
                        header("Location: ../../main.php?module=pedidos&alert=4");
                    }
                }
            }
        }
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
    }
?>