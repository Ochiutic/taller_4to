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

                $producto = $_POST['producto'];
                $cantidad=$_POST['cantidad'];
                $insert_detalle = mysqli_query($mysqli, "INSERT INTO det_pedido_cli(cod_pedi, cod_producto, cantidad) 
                                                        VALUES ( $codigo, $producto, $cantidad)")
                or die('Error 22: '.mysqli_error($mysqli));







                $descri_pedi = $_POST['descri_pedi'];
                $fecha = $_POST['fecha'];
                $hora = $_POST['hora'];
                $cod_razon = $_POST['cod_razon'];
                $name_user = $_POST['usuario'];
                $estado ='activo';
                $query = mysqli_query($mysqli, "INSERT INTO pedidos (cod_pedi, descri_pedi, fecha, hora, cod_razon, estado, id_user)
                VALUES ($codigo,'$descri_pedi','$fecha', '$hora', $cod_razon,'$estado','$name_user')") or die('error'.mysqli_error($mysqli));
                if($query){
                    header("Location: ../../main.php?module=pedidos&alert=1");
                }else{
                    header("Location: ../../main.php?module=pedidos&alert=4");
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