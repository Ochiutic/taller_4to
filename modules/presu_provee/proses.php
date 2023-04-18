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

                $materia = $_POST['materia'];
                $proveedor = $_POST['proveedor'];
                $cantidad=$_POST['cantidad'];
                $precio=$_POST['precio'];
                $insert_detalle = mysqli_query($mysqli, "INSERT INTO det_presu_prov(presu_cod, cod_materia,prv_cod, cantidad, precio) 
                                                        VALUES ( $codigo, $materia,$proveedor, $cantidad, $precio)")
                or die('Error 22: '.mysqli_error($mysqli));







                $pedido_compra = $_POST['pedido_compra'];
                $fecha = $_POST['fecha'];
                $sucursal = $_POST['sucursal'];
                $name_user = $_POST['usuario'];    
                $descrip = $_POST['descrip'];
                $estado ='activo';
                $query = mysqli_query($mysqli, "INSERT INTO presu_provee (presu_cod, presu_decri, presu_fecha, estado, id_user, cod_sucursal, ped_cod)
                VALUES ($codigo,'$descrip','$fecha', '$estado', '$name_user','$sucursal','$pedido_compra')") or die('error'.mysqli_error($mysqli));
                if($query){
                    header("Location: ../../main.php?module=presu_provee&alert=1");
                }else{
                    header("Location: ../../main.php?module=presu_provee    &alert=4");
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
            if(isset($_GET['presu_cod'])){
                $codigo = $_GET['presu_cod'];

                $query = mysqli_query($mysqli, "UPDATE presu_provee SET estado='anulado'
                                                WHERE presu_cod = $codigo")
                                                or die('error'.mysqli_error($mysqli));
                if($query){
                    header("Location: ../../main.php?module=presu_provee&alert=3");
                }else{
                    header("Location: ../../main.php?module=presu_provee&alert=4");
                }
            }
        }
    }
?>